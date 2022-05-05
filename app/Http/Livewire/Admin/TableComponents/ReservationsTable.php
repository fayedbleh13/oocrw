<?php

namespace App\Http\Livewire\Admin\TableComponents;

use App\Mail\ReservationMail;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Nexmo\Laravel\Facade\Nexmo;

class ReservationsTable extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $reserve_id, $status, $total, $message; 

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
    }

    //download function for valid id's
    public function id_download()
    {
        $reserve = Reservation::find($this->reserve_id);
        $this->valid_id = $reserve->valid_id;
        return response()->download(public_path('img/img/'.$this->valid_id));
    }

    public function update($id)
    {
        $reserve = Reservation::where('id', $id)->first();
        $this->reserve_id = $id;
        $this->number = $reserve->mobile_number;
        $this->email = $reserve->email;
        $this->reciever = $reserve->firstname .' '. $reserve->lastname;
    }

    public function updateStatus()
    {
        $reserve = Reservation::find($this->reserve_id);
        $reserve->status = $this->status;
        $reserve->save();
        
        $sender = Auth::user()->name;
        $sender_email = Auth::user()->email;
        $sender_number = Auth::user()->mobile_number;

        //function for sending through emails
        Mail::to($this->email)->send(new ReservationMail($sender_email, $this->message, $this->reciever, $sender));
        
        //function for sending through SMS
        Nexmo::message()->send([
            'to' => $this->number,
            'from' => '639675974934',
            'text' => $this->message
        ]);

        $this->clearForm();
        $this->dispatchBrowserEvent('closeModal'); //close modal after submit

        //sweet alert success notification Kemuri Haku
        $this->alert('success', 'Email and SMS notification successfully sent', [
            'position' => 'center',
            'icon' => 'success',
            'toast' => false,
            'timer' => 3000,
        ]);
    }
    /**
     * clear functionality
     */
    public function clearForm()
    {
         //reset all inputs
         $this->reset('message');

    }
    public function render()
    {
        $reserve = Reservation::where(function ($query) {
                        $query->where('firstname', 'LIKE', '%'.$this->search.'%' )
                            ->orWhere( 'email', 'LIKE', '%'.$this->search.'%' )
                            ->orWhere( 'email', 'LIKE', '%'.$this->search.'%' );
                            })
                            ->where('status', 0)
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);

                            
        return view('livewire.admin.table-components.reservations-table', compact('reserve'))->layout('layouts.admin');
    }
}
