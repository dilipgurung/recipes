<?php

use Gousto\Models\Rating;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 20) as $index) {
            Rating::create([
                'recipe_id' => rand(1, 10),
                'rating' => rand(1, 5)
            ]);
        }
    }
}
