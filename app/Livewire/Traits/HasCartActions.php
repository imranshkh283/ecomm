<?php

namespace App\Livewire\Traits;

use App\Services\CartService;

trait HasCartActions
{

    public function addToCart($product, CartService $cartService): void
    {
        $cartService->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
        ]);

        $this->dispatch('cart-updated');

        $this->dispatch('show-alert', [
            'type' => 'success',
            'message' => "{$product->name} added to cart successfully!",
        ]);
    }
}
