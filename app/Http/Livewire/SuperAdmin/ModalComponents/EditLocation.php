<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class EditLocation extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-location')->layout('layouts.super_admin');
    }
}
