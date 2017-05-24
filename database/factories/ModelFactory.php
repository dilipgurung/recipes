<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Gousto\Models\Recipe::class, function (Faker\Generator $faker) {

    $cuisine = [
        'asian',
        'italian',
        'british',
        'mediterranean',
        'mexican'
    ];

    return [
        'box_type' => $faker->word,
        'title' => $faker->sentence,
        'slug' => $faker->slug(5),
        'short_title' => $faker->word,
        'marketing_description' => $faker->sentence(10),
        'calories_kcal' => $faker->numberBetween(1, 500),
        'protein_grams' => $faker->numberBetween(1, 100),
        'fat_grams' => $faker->numberBetween(1, 50),
        'carbs_grams' => $faker->numberBetween(1, 100),
        'bulletpoint1' => $faker->words(3, true),
        'bulletpoint2' => null,
        'bulletpoint3' => null,
        'recipe_diet_type_id' => $faker->word,
        'season' => $faker->word,
        'base' => $faker->word,
        'protein_source' => $faker->word,
        'preparation_time_minutes' => $faker->numberBetween(1, 30),
        'shelf_life_days' => $faker->numberBetween(1, 5),
        'equipment_needed' => $faker->words(3, true),
        'origin_country' => $faker->word,
        'recipe_cuisine' => $cuisine[array_rand($cuisine)],
        'in_your_box' => $faker->sentence(10),
        'gousto_reference' => $faker->numberBetween(1, 100)
    ];
});

$factory->define(Gousto\Models\Rating::class, function (Faker\Generator $faker) {
    return [
        'recipe_id' => function() {
            return factory(Gousto\Models\Recipe::class)->create()->id;
        },
        'rating' => $faker->numberBetween(1, 5)
    ];
});