<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail-product', function(){
    return view('detail-product', [
        "title" => 'Detail'
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/stock', [StockController::class, 'index'])->name('product');
    Route::get('/edit/{id}', [StockController::class, 'edit']);
    Route::post('/stock', [StockController::class, 'create'])->name('create-stock');
    Route::post('/update/{id}', [StockController::class, 'update']);
    Route::post('/delete/{id}', [StockController::class, 'destroy']);
    Route::get('/sold', function () {
        return view('dashboard.sold',  ['title' => ' Sold']);
    })->name('sold');
    Route::get('/transaction', function () {
        return view('dashboard.transaction',  ['title' => 'Transaction']);
    })->name('transaction');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
