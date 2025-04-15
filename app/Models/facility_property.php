<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facility_property extends Model
{
    //
    protected $table = 'facility_property';

    protected $guarded = [];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
