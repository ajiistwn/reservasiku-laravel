<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements
    FilamentUser,
    HasAvatar // MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->image ? Storage::url('/' . $this->image) : asset('default-avatar.png');
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return $this->role === 'admin' || $this->role === 'business'; // Bisa disesuaikan, misalnya cek role atau permission
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    protected static function booted()
    {
        static::saved(function ($user) {
            $oldImage = $user->getOriginal('image');
            $newImage = $user->image;

            if ($oldImage && $oldImage !== $newImage) {
                logger()->info('Deleting old profile image: ' . $oldImage);

                if (Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($user) {
            $file = $user->image;
            if ($file) {
                logger()->info('Deleting user profile image: ' . $file);
                    Storage::disk('public')->delete($file);
            }

        });
    }

}
