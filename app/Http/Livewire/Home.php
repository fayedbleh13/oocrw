<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    public $price_sort;
    public $min_price, $max_price;

    public function mount()
    {
        $this->price_sort = 'default';
        $this->min_price = 1;
        $this->max_price = 6000;
    }

    public function render()
    {
        //price sorting
        if ($this->price_sort == 'default') {
            $listing = Listing::whereBetween('price', [$this->min_price, $this->max_price])->paginate(12);
        } elseif ($this->price_sort == 'asc') {
            $listing = Listing::whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'ASC')->paginate(12);
        } elseif ($this->price_sort == 'desc') {
            $listing = Listing::whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'DESC')->paginate(12);
        }

        $category = Category::all();
        
        return view('livewire.home', compact('category', 'listing'))->layout('layouts.app');
    }
}
