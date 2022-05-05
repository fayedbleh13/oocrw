<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Building;
use App\Models\Listing;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $admin = User::where('user_type', 'ADM')->count();
        $unit = Listing::all()->count();
        $building = Building::all()->count();

        return view('livewire.super-admin.dashboard', compact('admin', 'unit', 'building'))->layout('layouts.super_admin');
    }
}
