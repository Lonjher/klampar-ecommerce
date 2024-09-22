<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product:slug}', [ProductController::class, 'show']);
Route::get('/profil/{user:username}', [ProfileController::class, 'show']);

Route::middleware('auth')->group(function () {
    // Route::get('/shop-reservation', [HomeController::class, 'create'])->name('shop-reservation');
    // Route::post('/shop-reservation', [HomeController::class, 'store'])->name('store-reservation');

    Route::get('/order-product/{user:username}', [ReservationController::class, 'show']);
    Route::post('/order-product', [ReservationController::class, 'store'])->name('order-product');
    Route::get('/user-profile/{user:username}', [ProfileController::class, 'index']);
    Route::post('/user-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['admin', 'seller'])->group(function () {
    Route::get('/reservation/{user:username}', [ReservationController::class, 'index']);
    Route::get('/dashboard/{user:username}', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/product/{user:username}', [ProductController::class, 'index'])->name('product');
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/stock', [ProductController::class, 'create'])->name('create-stock');
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::post('/delete/{id}', [ProductController::class, 'destroy']);

    Route::middleware('admin')->group(function (){
        Route::get('/user-list', [DashboardController::class, 'listUser'])->name('users');
    });
});

require __DIR__.'/auth.php';
