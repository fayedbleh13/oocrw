<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        
        $role = Auth::user()->user_type;

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }
        
        switch ($role) {
            case 'ADM':
                return redirect()->route('admin.dashboard');
            case 'SADM':
                return redirect()->route('super-admin.dashboard');
            default:
                return redirect('/');
        }
                    
    }

}