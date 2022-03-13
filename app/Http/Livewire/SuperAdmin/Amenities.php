<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;

class Amenities extends Component
{
    public function render()
    {
        return view('livewire.super-admin.amenities')->layout('layouts.super_admin');
    }
}
