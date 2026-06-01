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
