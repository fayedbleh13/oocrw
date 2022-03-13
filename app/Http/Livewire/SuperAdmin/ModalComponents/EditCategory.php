<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use LivewireUI\Modal\ModalComponent;


class EditCategory extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-category')->layout('layouts.super_admin');
    }
}
