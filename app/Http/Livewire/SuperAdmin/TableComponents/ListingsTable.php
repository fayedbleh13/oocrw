<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Building;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Location;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ListingsTable extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 12;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $building_id, $category_id, $location_id, $image, $newImg, $condo_id;
    public $name, $image_gallery, $newimage_gallery;

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

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    
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
        $this->image_gallery = explode(',',$condo->image_gallery);
        $this->building_id = $condo->building_id;
        $this->category_id = $condo->category_id;
        $this->location_id = $condo->location_id;
    }

    public function view($id)
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
        $this->location_id = $condo->location_id;
    }

    public function updateCondo()
    {
        if ($this->condo_id) {
            $condo = Listing::find($this->condo_id);
            $condo->name = $this->name;
            $condo->slug = $this->slug;
            $condo->short_description = $this->short_description;
            $condo->description = $this->description;
            $condo->price = $this->price;
            $condo->promo_price = $this->promo_price;

            //featured image
            if ($this->newImg) 
            {
                unlink('img/img/'. $condo->image);
                $imgName = Carbon::now()->timestamp. '.' . $this->newImg->extension();
                $this->newImg->storeAs('img', $imgName);
                $condo->image = $imgName;
            }

            //image gallery
            if ($this->newimage_gallery) 
            {
                if ($condo->image_gallery) 
                {
                    $image_gallery = explode(',',$condo->image);
                    foreach ($image_gallery as $img) 
                    {
                        if ($img) 
                        {
                            unlink('img/img/'. $img);
                        }    
                    }    
                }
                $imgs = '';
                foreach ($this->newimage_gallery as $key => $image) 
                {
                    $imgName = Carbon::now()->timestamp. $key .'.'. $image->extension();
                    $image->storeAs('img', $imgName);
                    $imgs = $imgs . ',' . $imgName;
                }
                $condo->image_gallery = $imgs;
            }

            $condo->building_id = $this->building_id;
            $condo->category_id = $this->category_id;
            $condo->location_id = $this->location_id;
            $condo->save();
    
            return redirect('/super-admin/condominiums')->with('msg', 'This unit has been updated succesfully');
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
        $buildings = Building::all();
        $categories = Category::all();
        $locations = Location::all();

        return view('livewire.super-admin.table-components.listings-table', 
        compact('listings', 'buildings', 'categories', 'locations'))->layout('layouts.super_admin');
    }
}
