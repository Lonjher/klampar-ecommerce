<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(User $user){
        $stockCount = $user->product->count();
        $orderCount = $user->reservation->count();
        $userCount = User::count();
        $userOrderCount = $user->order()->count();

        return view('dashboard.index', [
            'title' => 'Dashboard'
        ], compact('userCount', 'orderCount', 'stockCount', 'userOrderCount'));
    }

    public function listUser()
    {
        $users = User::all();
        return view('dashboard.list-users', [
            'title' => 'List Pengguna',
            'users' => $users
        ]);
    }
}
