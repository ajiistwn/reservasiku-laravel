<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{

    //
    protected $table = 'rooms';

    protected $guarded = [];

    protected $casts = [
        'media' => 'array',
    ];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'facility_room');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }




    public static function booted()
    {
        static::saved(function ($record) {
            $oldFiles = $record->getOriginal('media') ?? [];
            $newFiles = $record->media ?? [];

            $deletedFiles = array_diff((array) $oldFiles, (array) $newFiles);
            logger()->info('DELETED FILES: ' . json_encode($deletedFiles));

            foreach ($deletedFiles as $file) {
                logger()->info('Deleting: ' . $file);
                Storage::disk('public')->delete($file);
            }
        });

        static::deleting(function ($property) {

            $files = $property->media;
            if ($files) {
                foreach ($files as $file) {
                    logger()->info('Deleting: ' . $file);
                    Storage::disk('public')->delete($file);
                }
            }
        });
    }


}
