<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $guarded = [];

    protected $table = 'reservations';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function property()
    // {
    //     return $this->belongsTo(Property::class);
    // }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

}
