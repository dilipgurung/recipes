<?php

namespace Gousto\Http\Controllers;

use App\Http\Controllers\Controller;
use Gousto\Models\Rating;
use Gousto\Pagination\Paginator;
use Gousto\Repositories\RatingRepository;
use Gousto\Repositories\RecipeRepository;
use Gousto\Transformers\RatingTransformer;
use Gousto\Validations\RatingValidation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatingController extends Controller
{
    use Paginator;

    /**
     * @var \Gousto\Repositories\RecipeRepository
     */
    protected $recipe;

    /**
     * @var \Gousto\Transformers\RatingTransformer
     */
    protected $transformer;

    /**
     * @var \Gousto\Validations\RatingValidation
     */
    protected $validation;

    /**
     * @var \Gousto\Repositories\RatingRepository
     */
    protected $rating;

    /**
     * RatingController constructor.
     *
     * @param  \Gousto\Repositories\RecipeRepository  $recipe
     * @param  \Gousto\Repositories\RatingRepository  $rating
     * @param  \Gousto\Transformers\RatingTransformer  $transformer
     * @param  \Gousto\Validations\RatingValidation  $validation
     */
    public function __construct(RecipeRepository $recipe, RatingRepository $rating, RatingTransformer $transformer, RatingValidation $validation)
    {
        $this->transformer = $transformer;
        $this->validation = $validation;
        $this->recipe = $recipe;
        $this->rating = $rating;
    }

    /**
     * Return all ratings
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->perPage = $request->get('per_page') ?: $this->perPage;
        $ratings = $this->rating->findBy($request->except($this->excludes), $this->perPage);

        return $this->paginate($ratings);
    }

    /**
     * Store a new Rating for a Recipe
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $recipeID
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $recipeID)
    {
        $this->validate($request, $this->validation->rules());

        $recipe = $this->recipe->find($recipeID);
        $recipe->ratings()->save(new Rating($request->only('rating')));

        return response()->json([
            'message' => 'Rating created successfully',
        ], Response::HTTP_CREATED);
    }

}
