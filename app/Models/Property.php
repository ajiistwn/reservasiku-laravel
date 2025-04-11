<?php

namespace App\Models;


use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use InteractsWithMedia;
    //
    protected $table = 'properties';
    //
    protected $guarded = [];

    protected $casts = [
        'media' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
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
