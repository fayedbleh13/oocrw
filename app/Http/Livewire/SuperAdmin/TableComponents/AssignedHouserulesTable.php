<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Building;
use App\Models\Houserule;
use App\Models\Listing;
use App\Models\Listings_Houserules;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AssignedHouserulesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $selectedBuildings, $selectedUnits, $house_rule = [];
    
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

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

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

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    //end of column sorting function

    public function edit($id)
    {
        $houserules = Listings_Houserules::where('id', $id)->first();
        $this->houserules_id = $id;
    }

    public function reAssignHouserules()
    {
        if ($this->houserules_id) {
            $houserules = Listings_Houserules::find($this->houserules_id);
            $houserules->listings_id = $this->selectedUnits;
            $houserules->building_id = $this->selectedBuildings;
            $houserules->house_rules = $this->house_rule;
            $houserules->save();
    
            return redirect('/super-admin/house-rules')->with('msg', 'Houserules has been re-assigned succesfully');
        }
    }

    public function render()
    {
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $house_rules = Listings_Houserules::where(function ($query) {
            $query->where('listings_id', 'LIKE', '%'.$this->search.'%' )
                ->orWhere( 'building_id', 'LIKE', '%'.$this->search.'%' );
        })
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.super-admin.table-components.assigned-houserules-table', compact('house_rules'))->layout('layouts.super_admin');
    }
}
