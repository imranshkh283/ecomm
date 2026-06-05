<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Traits\HasStoreData;
use App\Services\CartService;

class LoginPage extends Component
{
    use HasStoreData;

    public string $search = '';
    public string $newsletterEmail = '';

    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

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

    public function login()
    {
        $this->validate();

        if (! Auth::guard('customer')->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {

            $this->addError('email', 'Invalid credentials.');
            return;
        }

        session()->regenerate();

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('/');
    }

    public function render()
    {
        return view('livewire.login-page');
    }
}
