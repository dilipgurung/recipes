<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class RecipeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_recipe_has_ratings()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->create();
        $rating = factory(Gousto\Models\Rating::class)->create(['recipe_id' => $recipe->id]);

        $this->assertTrue($recipe->ratings->contains($rating));
    }
}
