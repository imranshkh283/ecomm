<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Livewire\Traits\HasStoreData;
use App\Services\CartService;
use App\Models\Customer;

class RegisterPage extends Component
{
    use HasStoreData;

    public string $search = '';
    public string $newsletterEmail = '';

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;

    public function mount(): void
    {
        $this->loadStoreData();
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

    public function register()
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:customers,email'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'min:5', 'confirmed'],
        ]);

        Customer::create(['first_name' => $validated['first_name'], 'last_name' => $validated['last_name'], 'email' => $validated['email'], 'phone' => $validated['phone'], 'password' => Hash::make($validated['password']),]);

        session()->flash('success', 'Registration successful.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register-page');
    }
}
