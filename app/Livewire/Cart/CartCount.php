<?php

namespace App\Livewire\Cart;

use App\Services\CartService;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCount extends Component
{
    public $count = 0;

    public function mount(CartService $cartService)
    {
        $this->count = $cartService->totalItems();
    }

    #[On('cart-updated')]
    public function refreshCount(CartService $cartService)
    {
        $this->count = $cartService->totalItems();
    }

    public function render()
    {
        return view('livewire.cart.cart-count');
    }
}
