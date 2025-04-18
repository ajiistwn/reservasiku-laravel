<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $guarded = [];
    protected $table = 'transactions';

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
