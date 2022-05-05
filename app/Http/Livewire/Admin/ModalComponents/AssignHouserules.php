<?php

namespace App\Http\Livewire\Admin\ModalComponents;

use App\Models\Building;
use App\Models\Houserule;
use App\Models\Listing;
use App\Models\Listings_Houserules;
use Livewire\Component;

class AssignHouserules extends Component
{
    public $selectedBuildings, $selectedUnits, $house_rules = [];
    public $units, $building, $hrules;

    public function mount()
    {   
        $this->hrules = Houserule::pluck('name', 'id');
        $this->building = Building::all();
        $this->units = collect();
    }

    public function updatedSelectedBuildings($building_id)
    {
        $this->units = Listing::where('building_id', $building_id)->get(); 
    }

    public function assignHouserules()
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
            'house_rules' => json_encode($this->house_rules),
        ];

        Listings_Houserules::create($input);
        
        return redirect('/admin/house-rules')->with('msg', 'House-rules has been assigned succesfully');
    }

    public function render()
    {
        return view('livewire.admin.modal-components.assign-houserules')->layout('layouts.admin');
    }
}
