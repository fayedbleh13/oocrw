<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.super-admin.dashboard')->layout('layouts.super_admin');
    }
}
