<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CategoriesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $categories, $categories_id;

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
        $categories = Category::where('id', $id)->first();
        $this->categories_id = $id;
        $this->name = $categories->name;
        $this->slug = $categories->slug;
        $this->description = $categories->description;
    }

    public function updateCategory()
    {
        if ($this->categories_id) {
            $categories = Category::find($this->categories_id);
            $categories->name = $this->name;
            $categories->slug = $this->slug;
            $categories->description = $this->description;
            $categories->save();
    
            return redirect('/super-admin/categories')->with('msg', 'Category has been updated succesfully')->layout('layouts.super_admin');
        }
    }


    public function render()
    {
        // 1st query is search function
        // 2nd query is column sorting function
        // 3rd query is for pagination and per-page function

        $cat = Category::where(function ($query) {
                            $query->where('name', 'LIKE', '%'.$this->search.'%' )
                                ->orWhere( 'description', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);

        return view('livewire.super-admin.table-components.categories-table', ['cat' => $cat]);
    }
}
