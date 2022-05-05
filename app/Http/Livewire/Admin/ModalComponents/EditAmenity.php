<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use Livewire\Component;

class EditAmenity extends Component
{
    public function render()
    {
        return view('livewire.admin.modal-components.edit-amenity')->layout('layouts.admin');
    }
}
