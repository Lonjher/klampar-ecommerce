<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index(User $user)
    {
        $orders = $user->order()->paginate(10);
        return view('dashboard.user-order', [
            'title' => 'Pesanan User',
            'orders' => $orders
        ]);
    }
}
