<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class ProductGrid extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.product.product-grid');
    }
}
