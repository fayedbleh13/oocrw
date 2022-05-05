<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class EditAssignedHouserules extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-assigned-houserules')->layout('layouts.super_admin');
    }
}
