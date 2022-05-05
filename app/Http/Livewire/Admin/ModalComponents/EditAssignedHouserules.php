<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use Livewire\Component;

class EditAssignedHouserules extends Component
{
    public function render()
    {
        return view('livewire.admin.modal-components.edit-assigned-houserules')->layout('layouts.admin');
    }
}
