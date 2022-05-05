<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class ViewLocation extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.view-location')->layout('layouts.super_admin');
    }
}
