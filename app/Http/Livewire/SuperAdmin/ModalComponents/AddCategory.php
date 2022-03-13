<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddCategory extends ModalComponent
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

    public function addCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $categories = new Category();
        $categories->name = $this->name;
        $categories->slug =$this->slug;
        $categories->description = $this->description;
        $categories->save();

        return redirect('/super-admin/categories')->with('msg', 'New Category has been added succesfully');
    }

    public function render()
    {
        return view('livewire.super-admin.modal-components.add-category')->layout('layouts.super-admin');
    }
}
