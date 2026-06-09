<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Menu as MenuModel;
use App\Services\CartService;
use Livewire\Attributes\On;

class Menu extends Component
{
    public $menuItems;
    public $cartCount = 0;
    public string $search = '';

    public function mount(CartService $cartService)
    {
        $this->menuItems = MenuModel::with('children')
            ->topLevel()
            ->get();

        $cart = $cartService->getCart();

        $this->cartCount = optional($cart?->items)->count() ?? 0;
    }

    #[On('cart-updated')]
    public function refreshCart(CartService $cartService)
    {
        $cart = $cartService->getCart();

        $this->cartCount = $cart
            ? $cart->items->count()
            : 0;
    }

    public function render()
    {
        return view('livewire.partials.menu');
    }
}
