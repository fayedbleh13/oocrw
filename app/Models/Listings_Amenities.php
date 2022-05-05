<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings_Amenities extends Model
{
    use HasFactory;

    protected $table = 'listings_amenities';

    protected $fillable = [
        'listings_id',
        'building_id',
        'amenities',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listings_id');
    }

}
