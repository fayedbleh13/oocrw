<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use App\Models\Reservation;
use LivewireUI\Modal\ModalComponent;

class ViewReservation extends ModalComponent
{
    
    public function render()
    {
        return view('livewire.admin.modal-components.view-reservation')->layout('layouts.admin');
    }
}
