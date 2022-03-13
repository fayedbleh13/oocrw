<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Houserule;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddHouserules extends ModalComponent
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

    public function addHouserule()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $houserule = new Houserule();
        $houserule->name = $this->name;
        $houserule->slug =$this->slug;
        $houserule->description = $this->description;
        $houserule->save();

        return redirect('/super-admin/house-rules')->with('msg', 'New houserule has been added succesfully');
    }

    public function render()
    {
        return view('livewire.super-admin.modal-components.add-houserules')->layout('layouts.super_admin');
    }
}
