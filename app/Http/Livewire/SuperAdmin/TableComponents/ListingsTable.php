<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ListingsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $building_id, $categories_id;

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
        $condo = Listing::where('id', $id)->first();
        $this->condo_id = $id;
        $this->name = $condo->name;
        $this->slug = $condo->slug;
        $this->short_description = $condo->short_description;
        $this->description = $condo->description;
        $this->price = $condo->price;
        $this->promo_price = $condo->promo_price;
        $this->image = $condo->image;
        $this->building_id = $condo->building_id;
        $this->category_id = $condo->category_id;
    }

    public function updateListing()
    {
        if ($this->listings_id) {
            $condo = Listing::find($this->condo_id);
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
    
            return redirect('/super-admin/condo')->with('msg', 'Listing has been updated succesfully');
        }
    }

    public function render()
    {
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $listings = Listing::where(function ($query) {
                                $query->where('name', 'LIKE', '%'.$this->search.'%' )
                                    ->orWhere( 'description', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);

        return view('livewire.super-admin.table-components.listings-table', compact('listings'))->layout('layouts.super_admin');
    }
}
