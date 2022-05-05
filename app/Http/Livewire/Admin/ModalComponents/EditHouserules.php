<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use Livewire\Component;

class EditHouserules extends Component
{
    public function render()
    {
        return view('livewire.admin.modal-components.edit-houserules')->layout('layouts.admin');
    }
}
