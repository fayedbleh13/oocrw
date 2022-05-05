<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;

class ViewCategory extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.view-category')->layout('layouts.super_admin');
    }
}
