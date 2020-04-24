<?php

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class RatingTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     *
     * Test: GET /api/v1/recipes/{recipe_id}/ratings
     */
    public function it_fetches_all_ratings()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->create();
        $rating = factory(Gousto\Models\Rating::class)->create(['recipe_id' => $recipe->id]);

        $this->get('/api/v1/recipes/'.$recipe->id.'/ratings')
             ->seeJsonContains([
                 'recipe' => $recipe->title,
                 'rating' => $rating->rating,
             ])
             ->assertResponseOk();
    }

    /**
     * @test
     *
     * Test: POST /api/v1/recipes/{recipe_id}/ratings
     */
    public function it_creates_a_new_rating()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->create();

        $this->json('POST', '/api/v1/recipes/'.$recipe->id.'/ratings', ['rating' => 5])
             ->assertResponseStatus(Response::HTTP_CREATED);

        $this->get('/api/v1/recipes/'.$recipe->id.'/ratings')
             ->seeJson([
                 'recipe' => $recipe->title,
                 'rating' => 5,
             ]);
    }

    /**
     * @test
     *
     * Test: POST /api/v1/recipes/{recipe_id}/ratings
     */
    public function it_returns_an_error_for_missing_attributes()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->create();

        $this->json('POST', '/api/v1/recipes/'.$recipe->id.'/ratings', [])
             ->assertResponseStatus(Response::HTTP_BAD_REQUEST);

    }

}
