<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $table = 'amenities';
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // public function listing()
    // {
    //     return $this->belongsTo(Listing::class, 'listings_id');
    // }
}
