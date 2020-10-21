<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moderators()
    {
        return $this->belongsToMany(Moderator::class);
    }

    public function bio()
    {
        return $this->hasOne(BandBio::class);
    }

}
