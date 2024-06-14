<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "cname" => $this->faker->words(1, true),
            "cdescription" => $this->faker->sentence(1, true),
            "cimg" => $this->faker->randomElement(["aa.png", "bb.png", "cc.png"]),
        ];
    }
}
