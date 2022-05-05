<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class EditAssignedAmenities extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-assigned-amenities')->layout('layouts.super_admin');
    }
}
