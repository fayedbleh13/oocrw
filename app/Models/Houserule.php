<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houserule extends Model
{
    use HasFactory;

    protected $table = 'houserules';
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
