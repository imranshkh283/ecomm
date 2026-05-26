<?php

namespace App\Livewire\Cart;

use App\Services\CartService;
use Livewire\Attributes\On;
use Livewire\Component;

class CartPage extends Component
{

    public $cartItems = [];
    public $subtotal = 0;

    public function mount(CartService $cartService)
    {
        $this->loadCart($cartService);
    }

    #[On('cart-updated')]

    public function refreshCart(CartService $cartService)
    {
        $this->loadCart($cartService);
    }

    public function loadCart(CartService $cartService)
    {
        $this->cartItems = $cartService->getCart();
        $this->subtotal = $cartService->subtotal();
    }

    public function increase($productId, CartService $cartService)
    {
        $cartService->increaseQty($productId);

        $this->loadCart($cartService);

        $this->dispatch('cart-updated');
    }

    public function decrease($productId, CartService $cartService)
    {
        $cartService->decreaseQty($productId);

        $this->loadCart($cartService);

        $this->dispatch('cart-updated');
    }

    public function remove($productId, CartService $cartService)
    {
        $cartService->remove($productId);

        $this->loadCart($cartService);

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.cart.cart-page');
    }
}
