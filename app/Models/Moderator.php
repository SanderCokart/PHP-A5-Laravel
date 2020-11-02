<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bands()
    {
        return $this->belongsToMany(Band::class);
    }
}
