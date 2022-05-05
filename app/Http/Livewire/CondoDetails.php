<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\Listings_Amenities;
use App\Models\Listings_Houserules;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CondoDetails extends Component
{
    public $condo_slug;
    public $check_in, $check_out;

    public function mount($condo_slug)
    {
        $this->slug = $condo_slug;
    }
    
    public function render()
    {
        $condo = Listing::where('slug', $this->condo_slug)->first();
        Session::put('price', $condo->price);
        Session::put('id', $condo->id);

        $amenity = Listings_Amenities::where('listings_id', $condo->id)->first();
        $houserule = Listings_Houserules::where('listings_id', $condo->id)->first();

        return view('livewire.condo-details', compact('condo', 'amenity', 'houserule'))->layout('layouts.app');
    }
}
