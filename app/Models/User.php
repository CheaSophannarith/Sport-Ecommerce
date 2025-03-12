<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'country',
        'zip_code',
        'phone',
        'profile_image',
        'profile_completed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'profile_path',
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

    /**
     *
     * each user has many orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     *
     */

    public function orders(){

        return $this->hasMany(Order::class)
                    ->with('products')
                    ->latest();

    }

    /**
     *
     * get image path
     *
     */

    public function getProfilePathAttribute(): string
    {
        return $this->profile_image ? asset('storage/' . $this->profile_image) : ('https://cdn.pixabay.com/photo/2017/07/18/23/23/user-2517433_1280.png');
    }

}
