<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bands()
    {
        return $this->hasMany(Band::class);
    }

    public function moderator()
    {
        return $this->hasOne(Moderator::class);
    }

    /**
     * When a user is created it will also create a moderator attached to the user and uses the same name as the user
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->moderator()->create([
                'name' => $user->name,
            ]);
        });
    }
}
