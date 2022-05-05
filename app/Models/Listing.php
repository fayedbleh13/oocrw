<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $table = 'listings';
    
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'promo_price',
        'featured',
        'image',
        'building_id',
        'category_id',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
