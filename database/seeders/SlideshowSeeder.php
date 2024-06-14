<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slideshow;

class SlideshowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slideshow::factory(10)->create();
    }
}
