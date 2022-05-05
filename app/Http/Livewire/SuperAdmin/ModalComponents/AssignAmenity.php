<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Amenity;
use App\Models\Building;
use App\Models\Listing;
use App\Models\Listings_Amenities;
use LivewireUI\Modal\ModalComponent;


class AssignAmenity extends ModalComponent
{
    public $selectedBuildings, $selectedUnits, $amenities = [];
    public $units, $building, $amenity;

    public function mount()
    {   
        $this->amenity = Amenity::pluck('name', 'id');
        $this->building = Building::all();
        $this->units = collect();
    }

    public function updatedSelectedBuildings($building_id)
    {
        $this->units = Listing::where('building_id', $building_id)->get(); 
    }

    public function assignAmenities()
    {
        $this->validate([
            'selectedBuildings' => 'required',
            'selectedUnits' => 'required',
        ], [
            'selectedBuildings.required' => 'The buildings field is required',
            'selectedUnits.required' => 'The unit listings field is required'
        ]);

        $input = [
            'listings_id' => $this->selectedUnits,
            'building_id' => $this->selectedBuildings,
            'amenities' => json_encode($this->amenities),
        ];

        Listings_Amenities::create($input);
        
        return redirect('/super-admin/amenities')->with('msg', 'Amenities has been assigned succesfully');
    }

    public function render()
    {
        return view('livewire.super-admin.modal-components.assign-amenity')->layout('layouts.super_admin');
    }
}
