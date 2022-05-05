<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Location;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddLocation extends ModalComponent
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

    public function addLocation()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $locations = new Location();
        $locations->name = $this->name;
        $locations->slug =$this->slug;
        $locations->description = $this->description;
        $locations->save();

        return redirect('/super-admin/locations')->with('msg', 'New Location has been added succesfully');
    }


    public function render()
    {
        return view('livewire.super-admin.modal-components.add-location')->layout('layouts.super_admin');
    }
}
