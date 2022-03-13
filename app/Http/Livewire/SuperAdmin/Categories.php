<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        return view('livewire.super-admin.categories')->layout('layouts.super_admin');
    }
}
