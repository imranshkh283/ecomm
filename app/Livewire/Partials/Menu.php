<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Category;
use App\Services\CartService;
use Livewire\Attributes\On;

class Menu extends Component
{
    public $categories;
    public $cartCount = 0;
    public string $search = '';

    public function mount(\App\Services\CartService $cartService)
    {
        $this->categories = Category::all();

        $this->cartCount = count($cartService->getCart());
    }

    #[On('cart-updated')]
    public function refreshCart(CartService $cartService)
    {
        $this->cartCount = count($cartService->getCart());
    }
    public function render()
    {
        return view('livewire.partials.menu');
    }
}
