<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Amenities extends Component
{
    public function render()
    {
        return view('livewire.admin.amenities')->layout('layouts.admin');
    }
}
