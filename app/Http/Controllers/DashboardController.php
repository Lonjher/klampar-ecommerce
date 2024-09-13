<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $userCount = User::count();
        $orderCount = Reservation::count();
        $stockCount = Product::count();

        return view('dashboard.index', [
            'title' => 'Dashboard'
        ], compact('userCount', 'orderCount', 'stockCount'));
    }
}
