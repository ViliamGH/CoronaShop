<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;;

use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "pname" => $this->faker->words(1, true),
            "pdescription" => $this->faker->sentence(1, true),
            "enable" => '1',
            "feature" => $this->faker->randomElement([0, 1]),
            "pprice" => $this->faker->numberBetween(1, 100),
            "pimg" => $this->faker->randomElement(['a.png', 'b.png', 'c.png']),
            "cid" => Category::all()->random()->cid,
            "quantity" => $this->faker->numberBetween(1, 100),
        ];
    }
}
