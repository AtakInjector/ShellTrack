<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //

    protected $fillable = [
        'owner_id',
        'category_id',
        'agent_id',
        'description',
        'address',
        'city',
        'country',
        'price',
        'bedrooms',
        'bathrooms',
        'property_type',
        'listing_date',
    ];

    protected $casts = [
        'price' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer'
    ];

      public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

     public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
