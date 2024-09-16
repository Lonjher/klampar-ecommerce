<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);

        return view('shops.home', [
            'title' => 'Home',
            'products' => $products
        ]);
    }

    public function create(){
        return view('shops.reservation', [
            'title' => 'Pemesanan'
        ]);
    }

    public function store(Request $request){
        $validData = $request->validate([
            'description' => 'required|min:10',
            'quantity' => 'required|numeric|min:1',
            'deadline' => 'required|date|after:tomorrow'
        ]);

        $validData['sample'] = $request->file('sample')->store('reservations');
        $validData['user_id'] = Auth::user()->id_user;
        $validData['deadline'] = Carbon::parse($request->deadline)->translatedFormat('Y-m-d');;
        Reservation::create($validData);
        return back()->with('success', 'Data Pesanan berhasil disimpan!');
    }
}
