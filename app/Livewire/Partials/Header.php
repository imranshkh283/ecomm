<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;

class Header extends Component
{
    public string $search = '';

    public function mount() {}


    public function render()
    {
        return view('livewire.partials.header');
    }
}
