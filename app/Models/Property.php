<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
