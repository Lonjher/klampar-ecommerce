<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{

    public function index(){
        $stocks = Product::all();

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
            'product_image' => $validData['product_image'],
            'product_name' => $request->product_name,
            'description' => $request->description,
            'first_price' => $request->first_price,
            'price_sell' => $request->price_sell,
            'quantity' => $request->quantity,
            'status' => $request->status
        ]);

        // $stock = DB::table('stocks')->orderBy('created_at', 'desc')->first();
        // ProductImage::create([
        //     'product_id' => $stock->id_product,
        //     'image_name' => $validatedData['product_image']
        // ]);

        return back();
    }
}
