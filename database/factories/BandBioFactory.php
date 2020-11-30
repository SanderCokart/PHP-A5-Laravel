<?php

namespace Database\Factories;

use App\Models\Band;
use App\Models\BandBio;
use Illuminate\Database\Eloquent\Factories\Factory;

class BandBioFactory extends Factory
{
    protected $model = BandBio::class;

    public function definition()
    {
        return [
            'bio' => $this->faker->realText(1000),
            'link_1' => 'https://www.youtube.com/watch?v=ImtZ5yENzgE',
            'link_2' => 'https://www.youtube.com/watch?v=ImtZ5yENzgE',
            'link_3' => 'https://www.youtube.com/watch?v=ImtZ5yENzgE',
            'bg_color' => $this->faker->hexColor,
            'text_color' => $this->faker->hexColor,
            'image' => $this->faker->imageUrl(),
            'band_id' => Band::factory(),
        ];
    }
}
