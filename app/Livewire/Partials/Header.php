<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public string $search = '';

    protected $listeners = [
        'login-success' => '$refresh',
        'logout' => '$refresh',
    ];

    public function mount() {}

    public function getUserProperty()
    {
        return Auth::guard('customer')->user();
    }

    public function render()
    {
        return view('livewire.partials.header');
    }
}
