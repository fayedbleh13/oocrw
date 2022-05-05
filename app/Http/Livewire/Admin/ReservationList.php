<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ReservationList extends Component
{
    
    public function render()
    {
        return view('livewire.admin.reservation-list')->layout('layouts.admin');
    }
}
