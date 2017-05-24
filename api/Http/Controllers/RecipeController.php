<?php

namespace Gousto\Http\Controllers;

use App\Http\Controllers\Controller;
use Gousto\Repositories\RecipeRepository;

class RecipeController extends Controller
{

    /**
     * @var \Gousto\Repositories\RecipeRepository
     */
    protected $recipe;

    /**
     * RecipeController constructor.
     *
     * @param \Gousto\Repositories\RecipeRepository $recipe
     */
    public function __construct(RecipeRepository$recipe)
    {
        $this->recipe = $recipe;
    }

    public function index()
    {
        return $this->recipe->all();
    }
}