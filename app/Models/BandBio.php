<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandBio extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio', 'link_1', 'link_2', 'link_3', 'bg_color', 'text_color', 'image',
    ];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function image()
    {
        return ($this->image) ? $this->image : '/storage/folder/missing_image.jpeg';
    }
}
