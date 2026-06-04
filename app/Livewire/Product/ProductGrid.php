<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class ProductGrid extends Component
{
    public array $productIds = [];
    public $products = [];

    public function mount(array $productIds = [])
    {
        $this->productIds = $productIds;
        $this->products = $this->loadProducts();
    }

    protected function loadProducts()
    {
        return Product::query()
            ->whereIn('id', $this->productIds)
            ->get()
            ->sortBy(fn($product) => array_search($product->id, $this->productIds));
    }

    public function render()
    {
        return view('livewire.product.product-grid', [
            'products' => $this->products,
        ]);
    }
}
