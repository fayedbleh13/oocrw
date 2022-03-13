<?php

namespace App\Http\Livewire\SuperAdmin\ModalComponents;

use App\Models\Admins;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class AddAdmin extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $user_type;

    // protected $rules = [
    //     'name' => 'required',
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ];
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function addAdmin()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $hashPass = Hash::make($this->password);

        $admin = new User();
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->password = $hashPass;
        $admin->user_type = 'ADM';
        $admin->save();

        return redirect('/super-admin/admins-table')->with('msg', 'New Admin has been created succesfully');
    }

    public function render()
    {


        return view('livewire.super-admin.modal-components.add-admin')->layout('layouts.super-admin');
    }
}
