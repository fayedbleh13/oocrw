<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    
    protected $fillable = [
        'firstname',
        'lastname',
        'initial',
        'email',
        'mobile_number',
        'gender',
        'birthdate',
        'civil_status',
        'citizenship',
        'occupation',
        'valid_id',
        'check_in',
        'check_out',
        'total',
        'num_persons',
        'listings_id',

    ];
}
