<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Building;
use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class EditCondo extends ModalComponent
{
    public function render()
    {
        $buildings = Building::all();
        $categories = Category::all();

        return view('livewire.super-admin.modal-components.edit-condo', ['buildings' => $buildings, 'categories' => $categories])->layout('layouts.super_admin');
    }
}
