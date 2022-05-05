<?php

namespace App\Http\Livewire\Admin\TableComponents;

use App\Models\Houserule;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class HouseRulesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    
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
        $houserules = Houserule::where('id', $id)->first();
        $this->houserule_id = $id;
        $this->name = $houserules->name;
        $this->slug = $houserules->slug;
        $this->description = $houserules->description;
    }

    public function updateHouserule()
    {
        if ($this->houserule_id) {
            $houserules = Houserule::find($this->houserule_id);
            $houserules->name = $this->name;
            $houserules->slug = $this->slug;
            $houserules->description = $this->description;
            $houserules->save();
    
            return redirect('/admin/house-rules')->with('msg', 'Houserule has been updated succesfully');
        }
    }
    
    public function render()
    {
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $house_rules = Houserule::where(function ($query) {
            $query->where('name', 'LIKE', '%'.$this->search.'%' )
                ->orWhere( 'description', 'LIKE', '%'.$this->search.'%' );
        })
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);


        return view('livewire.admin.table-components.house-rules-table', compact('house_rules'))->layout('layouts.admin');
    }
}
