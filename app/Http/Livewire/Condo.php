<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Condo extends Component
{
    public function render()
    {
        return view('livewire.condo')->layout('layouts.app')->layouts('layout.app');
    }
}
