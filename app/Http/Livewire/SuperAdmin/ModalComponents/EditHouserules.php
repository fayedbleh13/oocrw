<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class EditHouserules extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-houserules')->layout('layouts.super_admin');
    }
}
