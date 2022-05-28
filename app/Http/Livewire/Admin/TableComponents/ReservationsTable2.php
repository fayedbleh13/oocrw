<?php

namespace App\Http\Livewire\Admin\TableComponents;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class ReservationsTable2 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $reserve_id, $status, $total; 

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
        
        $reserve = Reservation::where('id', $id)->first();
        $this->reserve_id = $id;
        $this->firstname = $reserve->firstname;
        $this->lastname = $reserve->lastname;
        $this->initials = $reserve->initial;
        $this->email = $reserve->email;
        $this->number = $reserve->mobile_number;
        $this->gender = $reserve->gender;
        $this->birthdate = $reserve->birthdate;
        $this->civil_status = $reserve->civil_status;
        $this->citizenship = $reserve->citizenship;
        $this->occupation = $reserve->occupation;
        $this->check_in = $reserve->check_in;
        $this->check_out = $reserve->check_out;
        $this->total = $reserve->total;
        $this->status = $reserve->status;
        $this->num_persons = $reserve->num_persons;
    }

    //download function for valid id's
    public function id_download()
    {
        $reserve = Reservation::find($this->reserve_id);
        $this->valid_id = $reserve->valid_id;
        return response()->download(public_path('img/img/'.$this->valid_id));
    }


    public function render()
    {
        $reserve = Reservation::where(function ($query) {
                        $query->where('firstname', 'LIKE', '%'.$this->search.'%' )
                            ->orWhere( 'email', 'LIKE', '%'.$this->search.'%' )
                            ->orWhere( 'email', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->where('status', 1)
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);

        return view('livewire.admin.table-components.reservations-table2', compact('reserve'))->layout('layouts.admin');
    }
}
