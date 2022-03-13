<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Http\Livewire\Condo;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddCondo extends ModalComponent
{   
    use WithFileUploads;
    
    public $name, $slug, $short_description, $description, $price, $promo_price, $image, $building_id, $category_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'building_id' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function addCondo()
    {
        $condo = new Listing();
        $condo->name = $this->name;
        $condo->slug = $this->slug;
        $condo->short_description = $this->short_description;
        $condo->description = $this->description;
        $condo->price = $this->price;
        $condo->promo_price = $this->promo_price;
        $imgName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('condo', $imgName);
        $condo->image = $imgName;
        $condo->building_id = $this->building_id;
        $condo->category_id = $this->category_id;
        $condo->save();
    }

    public function render()
    {
        return view('livewire.super-admin.modal-components.add-condo')->layout('layouts.super-admin');
    }
}
