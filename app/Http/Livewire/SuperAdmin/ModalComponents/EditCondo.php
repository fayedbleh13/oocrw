<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class EditCondo extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-condo')->layout('layouts.super_admin');
    }
}
