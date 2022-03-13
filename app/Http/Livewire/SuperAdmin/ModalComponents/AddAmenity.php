<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Amenity;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddAmenity extends ModalComponent
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

    public function addAmenity()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $amenity = new Amenity();
        $amenity->name = $this->name;
        $amenity->slug =$this->slug;
        $amenity->description = $this->description;
        $amenity->save();

        return redirect('/super-admin/amenities')->with('msg', 'New amenity has been added succesfully');
    }

    public function render()
    {
        return view('livewire.super-admin.modal-components.add-amenity')->layout('layouts.super_admin');
    }
}
