<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);

        return view('shops.home', [
            'title' => 'Home',
            'products' => $products
        ]);
    }
}
