<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Building;
use Illuminate\Auth\Access\Gate;
use LivewireUI\Modal\ModalComponent;

class EditBuilding extends ModalComponent
{
   
    public function render()
    {
        return view('livewire.super-admin.modal-components.edit-building')->layout('layouts.super_admin');
    }
}
