<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    protected $table = 'facilities';

    protected $guarded = [];
    
    protected $casts = [
        'property' => 'boolean',
        'room' => 'boolean',
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'facility_property');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'facility_room');
    }
}
