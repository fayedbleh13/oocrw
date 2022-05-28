<?php

namespace App\Http\Livewire\ModalComponents;

use App\Models\Listing;
use LivewireUI\Modal\ModalComponent;
use App\Models\Reservation;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Response;

class ReservationWizardModal extends ModalComponent
{
    use WithFileUploads;
    use LivewireAlert;

    public $currentStep = 1;
    public $firstname, $lastname, $initials, $email, $number, $gender, 
    $birthdate, $civil_status, $citizenship, $occupation, $check_in, $check_out, $num_persons;
    public $id_upload, $valid_id, $newFile;
    public $name, $detail, $status = 1;
    public $successMsg = '';
    public $price;
    
    // sets the default value for certain inputs
    public function mount()
    {
        $this->gender = 0;
        $this->civil_status = 1;
        
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'check_in' => 'required',
            'check_out' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'initials' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'gender' => 'required',
            'birthdate' => 'required',
            'civil_status' => 'required',
            'citizenship' => 'required',
            'occupation' => 'required',
            'num_persons' => 'required',
        ]);
 
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
             'id_upload' => 'required|mimes:pdf|max:5048',
        ]);
  
        $this->currentStep = 4;
    }
  
    /**
     * pretty self explanatory. submits the data to the database
     */
    public function submitForm()
    {
        $date_start = Carbon::parse($this->check_in);
        $date_end = Carbon::parse($this->check_out);
        
        $days = $date_start->diff($date_end)->days;
        $price = Session::get('price');
        
        $total = $price * $days;

        //id upload
        $fileName = Carbon::now()->timestamp. '.' . $this->id_upload->extension();
        $this->id_upload->storeAs('img', $fileName);
        
        Reservation::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'initial' => $this->initials,
            'email' => $this->email,
            'mobile_number' => '63'.$this->number,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'civil_status' => $this->civil_status,
            'citizenship' => $this->citizenship,
            'occupation' => $this->occupation,
            'valid_id' => $fileName,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'total' => $total,
            'num_persons' => $this->num_persons,
            'listings_id' => Session::get('id'),
        ]);
  
        $this->clearForm();
        $this->dispatchBrowserEvent('closeModal');

        $this->alert('success', 'Successfully sent the pre-reservation.', [
            'position' => 'center',
            'icon' => 'success',
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ok, got it!',
            'text' => 'Please wait for the further updates from your email or your sms. if you have concerns you can contact through our office hotline',
            'timer' => null,
 
        ]);

        $this->currentStep = 1;
    }
  
    /**
     * back method functionality
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * clear functionality
     */
    public function clearForm()
    {
         //reset all inputs
         $this->reset();

         Session()->flush();
    }

    public function render()
    {
        $date_start = Carbon::parse($this->check_in);
        $date_end = Carbon::parse($this->check_out);
        
        $days = $date_start->diff($date_end)->days;
        $price = Session::get('price');
        
        $total = $price * $days;

        $reserved_dates = Reservation::where('listings_id', Session::get('id'))->get();

        // dd($reserved_dates);
        return view('livewire.modal-components.reservation-wizard-modal', compact('days', 'total', 'price', 'reserved_dates'));
    }
}
