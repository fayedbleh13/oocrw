<?php

namespace App\Http\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $pendings = Reservation::where('status', 0)->count();
        $approved = Reservation::where('status', 1)->count();
        $overall = Reservation::all()->count();
        return view('livewire.admin.dashboard', compact('pendings','approved', 'overall'))->layout('layouts.admin');
    }
}
