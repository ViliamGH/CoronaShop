<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slideshow;

class SlideshowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(1),
            "subtitle" => $this->faker->sentence(1),
            "text" => $this->faker->sentence(3),
            "enable" => '1',
            "img" => $this->faker->randomElement(['a.png', 'b.png', 'c.png']),
            "ssorder" => $this->faker->numberBetween(1, 100),
        ];
    }
}
