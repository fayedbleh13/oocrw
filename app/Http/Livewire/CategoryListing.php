<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryListing extends Component
{
    use WithPagination;
    public $category_slug;
    public $price_sort;
    public $min_price, $max_price;

    public function mount($category_slug)
    {
        $this->price_sort = 'default';
        $this->category_slug = $category_slug;
        $this->min_price = 1;
        $this->max_price = 10000;
    }
    public function render()
    {
        $categories = Category::where('slug', $this->category_slug)->first();
        $category_id = $categories->id;
        $category_name = $categories->name;

        //price sorting
        if ($this->price_sort == 'default') {
            $listing = Listing::where('category_id', $category_id)->whereBetween('price', [$this->min_price, $this->max_price])->paginate(12);
        } elseif ($this->price_sort == 'asc') {
            $listing = Listing::where('category_id', $category_id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'ASC')->paginate(12);
        } elseif ($this->price_sort == 'desc') {
            $listing = Listing::where('category_id', $category_id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'DESC')->paginate(12);
        }

        $category = Category::all();
        

        return view('livewire.category-listing', compact('category', 'listing'));
    }
}
