<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Amenity;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AmenitiesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $amenities_id, $amen;
    public $amentiya;

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
        $amen = Amenity::where('id', $id)->first();
        $this->amen_id = $id;
        $this->name = $amen->name;
        $this->slug = $amen->slug;
        $this->description = $amen->description;
    }

    public function updateAmenity()
    {
        if ($this->amenities_id) {
            $amen = Amenity::find($this->amenities_id);
            $amen->name = $this->name;
            $amen->slug = $this->slug;
            $amen->description = $this->description;
            $amen->save();
    
            return redirect('/super-admin/amenities')->with('msg', 'Amenity has been updated succesfully')->layout('layouts.super_admin');
        }
    }

    public function render()
    {
        
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $amenitya = Amenity::where(function ($query) {
                                $query->where('name', 'LIKE', '%'.$this->search.'%' )
                                    ->orWhere( 'description', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);

        return view('livewire.super-admin.table-components.amenities-table', compact('amenitya'));
    }
}
