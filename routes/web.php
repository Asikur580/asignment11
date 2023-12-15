<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/store', [ProductController::class, 'storeForm'])->name('product.storeForm');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/update', [ProductController::class, 'updateForm'])->name('product.updateForm');
Route::post('/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/sell', [ProductController::class, 'sellForm'])->name('product.sellForm');
Route::post('/sell', [ProductController::class, 'sell'])->name('product.sell');


Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
