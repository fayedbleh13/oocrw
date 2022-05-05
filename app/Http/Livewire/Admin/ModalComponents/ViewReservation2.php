<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class ViewReservation2 extends ModalComponent
{
    public function render()
    {
        return view('livewire.admin.modal-components.view-reservation2')->layout('layouts.admin');
    }
}
