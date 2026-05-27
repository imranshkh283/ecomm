<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('website.cart');
    }
}
