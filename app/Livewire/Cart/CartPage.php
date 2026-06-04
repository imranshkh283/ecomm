<?php

namespace App\Livewire\Cart;

use App\Livewire\Traits\HasStoreData;
use App\Services\CartService;
use Livewire\Attributes\On;
use Livewire\Component;

class CartPage extends Component
{
    use HasStoreData;

    public $cartItems = [];
    public $subtotal = 0;
    public string $search = '';
    public string $newsletterEmail = '';

    public function getSearchResultsProperty()
    {
        return Product::when($this->search, function ($query) {
            return $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('category', 'like', "%{$this->search}%");
        })->limit(6)->get();
    }

    public function mount(CartService $cartService)
    {
        $this->loadStoreData();

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

    public function increase($cartId, CartService $cartService)
    {
        $cartService->increaseQty($cartId);

        $this->loadCart($cartService);

        $this->dispatch('cart-updated');
    }

    public function decrease($cartId, CartService $cartService)
    {
        $cartService->decreaseQty($cartId);

        $this->loadCart($cartService);

        $this->dispatch('cart-updated');
    }

    public function remove($cartId, CartService $cartService)
    {
        $cartService->remove($cartId);

        $this->loadCart($cartService);

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.cart.cart-page');
    }
}
