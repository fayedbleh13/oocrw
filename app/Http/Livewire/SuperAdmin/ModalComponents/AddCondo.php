<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Http\Livewire\Condo;
use App\Models\Building;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddCondo extends ModalComponent
{   
    use WithFileUploads;
    
    public $name, $slug, $short_description, $description, 
    $price, $promo_price, $image, $image_gallery, $location_id, $building_id, $category_id, $iteration;

    public function closeReset()
    {   
        //reset all inputs
        $this->reset();
        
        //reset file inputs or uploads
        $this->image = null;
        $this->iteration++;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function mount()
    {
        $this->promo_price = 0;
    }

    public function addCondo()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'price' => 'required',
            'promo_price' => 'required',
            'image' => 'required',
            'building_id' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
        ]);

        if ($this->image_gallery) {
            $this->validate([
                'image_gallery' => 'required',
            ]);
        }

        $condos = new Listing();
        $condos->name = $this->name;
        $condos->slug = $this->slug;
        $condos->short_description = $this->short_description;
        $condos->description = $this->description;
        $condos->price = $this->price;
        $condos->promo_price = $this->promo_price;
        
        //featured image
        $imgName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('img', $imgName);
        $condos->image = $imgName; 

        //image gallery
        if ($this->image_gallery) 
        {
            $imgs = '';
            foreach ($this->image_gallery as $key => $image) 
            {
                $imagesName = Carbon::now()->timestamp. $key .'.'. $image->extension();
                $image->storeAs('img', $imagesName);
                $imgs = $imgs . ',' . $imagesName;
            }
            $condos->image_gallery = $imgs;
        }

        $condos->building_id = $this->building_id;
        $condos->category_id = $this->category_id;
        $condos->location_id = $this->location_id;
        $condos->save();
    
        return redirect('/super-admin/condominiums')->with('msg', 'New Unit has been added succesfully');
    }

    public function render()
    {
        $buildings = Building::all();
        $categories = Category::all();
        $locations = Location::all();

        return view('livewire.super-admin.modal-components.add-condo', compact('buildings', 'categories', 'locations'))->layout('layouts.super-admin');
    }
}
