<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facility_room extends Model
{
    //

    protected $table = 'facility_room';
    protected $guarded = [];
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
    

