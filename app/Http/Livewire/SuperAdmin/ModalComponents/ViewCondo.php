<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class ViewCondo extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.view-condo')->layout('layouts.super_admin');
    }
}
