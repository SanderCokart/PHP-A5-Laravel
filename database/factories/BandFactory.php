<?php

namespace Database\Factories;

use App\Models\band;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class bandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = band::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => User::factory(),
        ];
    }
}
