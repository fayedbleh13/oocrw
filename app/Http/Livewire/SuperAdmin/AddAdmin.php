<?php

namespace App\Http\Livewire\SuperAdmin;

use LivewireUI\Modal\ModalComponent;

class AddAdmin extends ModalComponent
{
    public function render()
    {
        return view('livewire.super-admin.add-admin')->layout('layouts.super-admin');
    }
}
