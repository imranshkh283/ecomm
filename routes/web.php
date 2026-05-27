<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
