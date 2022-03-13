<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Building;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddBuilding extends ModalComponent
{
    public $name, $slug, $description;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function addBuilding()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $buildings = new Building();
        $buildings->name = $this->name;
        $buildings->slug =$this->slug;
        $buildings->description = $this->description;
        $buildings->save();

        return redirect('/super-admin/buildings')->with('msg', 'New Building has been added succesfully');
    }

    public function render()
    {
        return view('livewire.super-admin.modal-components.add-building')->layout('layouts.super-admin');
    }
}
