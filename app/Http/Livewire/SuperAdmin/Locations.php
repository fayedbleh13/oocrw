<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;

class Locations extends Component
{
    public function render()
    {
        return view('livewire.super-admin.locations')->layout('layouts.super_admin');
    }
}
