<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(User $user){
        $stockCount = DB::table('products')->where('user_id', '=', $user->id_user)->count();
        $orderCount = DB::table('reservations')->where('user_id', '=', $user->id_user)->count();
        $userCount = User::count();

        return view('dashboard.index', [
            'title' => 'Dashboard'
        ], compact('userCount', 'orderCount', 'stockCount'));
    }
}
