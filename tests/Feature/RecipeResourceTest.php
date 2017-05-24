<?php

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class RecipeResourceTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     *
     * Test: GET /api/v1/recipes
     */
    public function it_fetches_all_recipes()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->create();

        $this->get('/api/v1/recipes')
             ->seeJsonContains(['title' => $recipe->title])
             ->assertResponseOk();
    }

    /**
     * @test
     *
     * Test: GET /api/v1/recipes/{id}
     */
    public function it_fetches_a_single_recipe()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->create();

        $this->get('/api/v1/recipes/' . $recipe->id)
             ->seeJson(['title' => $recipe->title])
             ->assertResponseOk();
    }

    /**
     * @test
     *
     * Test: GET /api/v1/recipes/2
     */
    public function it_returns_a_404_status_if_recipe_not_found()
    {
        $this->get('/api/v1/recipes/2')
             ->seeJson([
                 'message' => 'Requested Model Not Found'
             ])
             ->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }

    /**
     * @test
     *
     * Test: POST /api/v1/recipes
     */
    public function it_creates_a_new_recipe()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->make();

        $this->json('POST', '/api/v1/recipes', $recipe->toArray())
             ->assertResponseStatus(Response::HTTP_CREATED);

        $this->get('/api/v1/recipes/1')
             ->seeJson([
                 'title' => $recipe->title,
                 'box_type' => $recipe->box_type,
                 'recipe_cuisine' => $recipe->recipe_cuisine
             ]);
    }

    /**
     * @test
     *
     * Test: PATCH /api/v1/recipes/{id}
     */
    public function it_updates_an_existing_recipe()
    {
        $recipe = factory(Gousto\Models\Recipe::class)->make();

        $this->json('POST', '/api/v1/recipes', $recipe->toArray())
             ->assertResponseStatus(Response::HTTP_CREATED);

        $updateFields = [
            'box_type' => 'gourmet',
            'recipe_cuisine' => 'mexican'
        ];
        $this->json('PATCH', '/api/v1/recipes/1', $updateFields)
             ->assertResponseOk();

        $this->get('/api/v1/recipes/1')
             ->seeJson($updateFields);
    }
}