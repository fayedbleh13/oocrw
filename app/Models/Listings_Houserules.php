<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings_Houserules extends Model
{
    use HasFactory;

    protected $table = 'listings_houserules';

    protected $fillable = [
        'listings_id',
        'building_id',
        'house_rules',
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
