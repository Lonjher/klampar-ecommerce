<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(User $user)
    {
        $stocks = $user->product()->paginate(10);

        return view('dashboard.stock',  [
            'title' => ' Stock',
            'products' => $stocks
        ]);
    }

    public function create(Request $request){

        $validData = $request->validate([
            'product_image' => 'required',
            'product_name' => 'required|max:255',
            'description' => 'required',
            'first_price' => 'required|numeric',
            'price_sell' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'required'
        ]);

        // store image
        $validData['product_image'] = $request->file('product_image')->store('stocks');
        Product::create([
            'user_id' => Auth::user()->id,
            'product_image' => $validData['product_image'],
            'slug'=> Str::slug($request->product_name,'-','id'),
            'product_name' => $request->product_name,
            'description' => $request->description,
            'first_price' => $request->first_price,
            'price_sell' => $request->price_sell,
            'quantity' => $request->quantity,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Produk Berhasil ditambahkan!');
    }

    public function destroy(string $id_product){
        $product = Product::findOrFail($id_product);

        Storage::delete($product->product_image);
        $product->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    public function edit(string $id_product): View
    {
        $product = Product::findOrFail($id_product);

        return view('dashboard.edit-stock', [
            'title' => ' Edit Stock',
            'product' => $product
        ]);
    }

    public function update(Request $request, $id_product){
        $product = Product::findOrFail($id_product);

        $validData = $request->validate([
            'product_name' => 'required|max:255',
            'first_price' => 'required|numeric',
            'price_sell' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $validData['slug'] = Str::slug($request->product_name,'-','id');


        if($request->description != null){
            $validData['description'] = $request->description;
        }else if($request->status != null){
            $validData['status'] = $request->status;
        }

        if($request->hasFile('product_image')){
            $validData['product_image'] = $request->file('product_image')->store('stocks');
            Storage::delete($product->product_image);
            $product->update($validData, [
                'product_image' => $validData['product_image']
            ]);
        }else {
            $product->update($validData);
        }

        return redirect()->back()->with('success', 'Produk Berhasil diubah!');
    }

    public function show(Product $product){
        return view('description', [
            'title' => 'Description',
            'product' => $product
        ]);
    }
}
