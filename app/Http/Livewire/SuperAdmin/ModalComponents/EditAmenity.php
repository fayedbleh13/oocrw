<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class EditAmenity extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-amenity')->layout('layouts.super_admin');
    }
}
