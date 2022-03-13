<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Building;
use Livewire\Component;

class Buildings extends Component
{
    
    public function render()
    {   
        return view('livewire.super-admin.buildings')->layout('layouts.super_admin');
    }
}
