<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Cart\CartPage;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', CartPage::class)
    ->name('cart');
