<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;

class Admins extends Component
{
    public function render()
    {
        return view('livewire.super-admin.admins')->layout('layouts.super_admin');
    }
}
