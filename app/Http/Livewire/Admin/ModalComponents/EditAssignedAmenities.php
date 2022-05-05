<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use Livewire\Component;

class EditAssignedAmenities extends Component
{
    public function render()
    {
        return view('livewire.admin.modal-components.edit-assigned-amenities')->layout('layouts.admin');
    }
}
