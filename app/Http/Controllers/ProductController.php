<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('livewire.products-page');
    }

    public function show(string $slug): View
    {
        return view('product.show');
    }
}
