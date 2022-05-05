<?php

namespace App\Http\Livewire\SuperAdmin\TableComponents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

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

    public function render()
    {
        // 1st query is search function
        // 2md query is for filtering to only admins position
        // 3rd query is column sorting function
        // 4th query is for pagination and per-page function

        $admen = User::where(function ($query) {
                                $query->where('name', 'LIKE', '%'.$this->search.'%' )
                                    ->orWhere( 'email', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->where('user_type', 'ADM')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);
                            
        return view('livewire.super-admin.table-components.admins-table', ['admen' => $admen])->layout('layout.super_admin');
    }
}
