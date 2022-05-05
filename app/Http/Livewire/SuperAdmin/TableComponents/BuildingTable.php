<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Building;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class BuildingTable extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $building, $building_id;

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
        $building = Building::where('id', $id)->first();
        $this->building_id = $id;
        $this->name = $building->name;
        $this->slug = $building->slug;
        $this->description = $building->description;
    }

    public function updateBuilding()
    {
        if ($this->building_id) {
            $building = Building::find($this->building_id);
            $building->name = $this->name;
            $building->slug = $this->slug;
            $building->description = $this->description;
            $building->save();
    
            return redirect('/super-admin/buildings')->with('msg', 'Building has been updated succesfully');
        }
    }

    public function render()
    {   
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $buildings = Building::where(function ($query) {
                                $query->where('name', 'LIKE', '%'.$this->search.'%' )
                                    ->orWhere( 'description', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);
        return view('livewire.super-admin.table-components.building-table', ['buildings' => $buildings])->layout('layouts.super_admin');
    }
}
