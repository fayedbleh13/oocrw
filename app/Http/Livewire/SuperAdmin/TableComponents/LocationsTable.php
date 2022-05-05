<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class LocationsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $location, $location_id;

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

    public function view($id)
    {
        $location = Location::where('id', $id)->first();
        $this->location_id = $id;
        $this->name = $location->name;
        $this->slug = $location->slug;
        $this->description = $location->description;
    }

    public function edit($id)
    {
        $location = Location::where('id', $id)->first();
        $this->location_id = $id;
        $this->name = $location->name;
        $this->slug = $location->slug;
        $this->description = $location->description;
    }

    public function updateLocation()
    {
        if ($this->location_id) {
            $location = Location::find($this->location_id);
            $location->name = $this->name;
            $location->slug = $this->slug;
            $location->description = $this->description;
            $location->save();
    
            return redirect('/super-admin/locations')->with('msg', 'Location has been updated succesfully');
        }
    }

    public function render()
    {
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $locations = Location::where(function ($query) {
                            $query->where('name', 'LIKE', '%'.$this->search.'%' )
                                ->orWhere( 'description', 'LIKE', '%'.$this->search.'%' );
        })
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);

        return view('livewire.super-admin.table-components.locations-table', compact('locations'))->layout('layouts.super_admin');
    }
}
