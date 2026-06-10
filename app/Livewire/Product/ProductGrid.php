<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Services\CartService;
use App\Livewire\Traits\HasCartActions;

class ProductGrid extends Component
{
    use HasCartActions {
        addToCart as protected traitAddToCart;
    }
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

    public function addToCart($productId, CartService $cartService)
    {
        $product = Product::findOrFail($productId);

        if (!$product->id) {
            session()->flash('error', 'Product not found');
            return;
        }

        $this->traitAddToCart($product, $cartService);

        $this->dispatch('cart-updated');

        session()->flash('success', 'Product added to cart successfully');
    }

    public function render()
    {
        return view('livewire.product.product-grid', [
            'products' => $this->products,
        ]);
    }
}
