<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Amenity;
use App\Models\Building;
use App\Models\Listing;
use App\Models\Listings_Amenities;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedAmenitiesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $amenities_id, $amen;
    public $amentiya, $amenities = [];
    public $selectedBuildings, $selectedUnits;

    // this is where column sorting function starts
    public function sortBy($field)
    {
       if ($this->sortField === $field) 
       {
            $this->sortDirection = $this->swapSortDirection(); 
       }
       else 
       {
            $this->sortDirection = 'asc';
       }

       $this->sortField = $field;
    }

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

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    //end of column sorting function

    public function edit($id)
    {
        $amen = Listings_Amenities::where('id', $id)->first();
        $this->amen_id = $id;
    }

    public function editAmenities()
    {
        if ($this->amen_id) {
            $amen = Listings_Amenities::find($this->amen_id);
            $amen->listings_id= $this->selectedUnits;
            $amen->building_id = $this->selectedBuildings;
            $amen->amenities = $this->amenities;
            $amen->save();
    
            return redirect('/super-admin/amenities')->with('msg', 'Update and re-assigned amenities successful');
        }
    }

    public function render()
    {
         // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $amenitya = Listings_Amenities::where(function ($query) {
            $query->where('listings_id', 'LIKE', '%'.$this->search.'%' )
                ->orWhere( 'building_id', 'LIKE', '%'.$this->search.'%' );
        })
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.super-admin.table-components.assigned-amenities-table', compact('amenitya'))->layout('layouts.super_admin');
    }
}
