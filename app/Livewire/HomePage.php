<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Services\CartService;
use App\Livewire\Traits\HasStoreData;

class HomePage extends Component
{
    use HasStoreData;

    public string $search = '';
    public string $newsletterEmail = '';

    public function mount(): void
    {
        $this->loadStoreData();
    }

    public function addToCart($productId, CartService $cartService)
    {
        $product = Product::findOrFail($productId);

        $cartService->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
        ]);

        $this->dispatch('cart-updated');

        session()->flash('success', 'Product added to cart successfully');
    }

    public function getSearchResultsProperty()
    {
        return Product::when($this->search, function ($query) {
            return $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('category', 'like', "%{$this->search}%");
        })->limit(6)->get();
    }

    public function subscribe(): void
    {
        $this->validate([
            'newsletterEmail' => 'required|email',
        ]);

        session()->flash('newsletterMessage', 'Thanks for subscribing!');
        $this->newsletterEmail = '';
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
