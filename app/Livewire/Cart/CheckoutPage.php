<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Services\CartService;

class CheckoutPage extends Component
{

    public $cartItems = [];
    public $subtotal = 0;

    public function loadCart(CartService $cartService)
    {
        $this->cartItems = $cartService->getCart();
        $this->subtotal = $cartService->subtotal();
    }

    public function mount(CartService $cartService)
    {
        $this->loadCart($cartService);
    }

    public function render()
    {
        return view('livewire.cart.checkout-page');
    }
}
