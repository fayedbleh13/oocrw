<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;

class Condominiums extends Component
{
    public function render()
    {
        return view('livewire.super-admin.condominiums')->layout('layouts.super_admin');
    }
}
