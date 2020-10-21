<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandBio extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio', 'link_1', 'link_2', 'link_3', 'bg_color', 'text_color',
    ];

    public function band()
    {
        return $this->hasOne(Band::class);
    }
}
