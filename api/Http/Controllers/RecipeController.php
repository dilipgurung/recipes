<?php

namespace Gousto\Http\Controllers;

use App\Http\Controllers\Controller;
use Gousto\Pagination\Paginator;
use Gousto\Repositories\RecipeRepository;
use Gousto\Transformers\RecipeTransformer;
use Gousto\Validations\RecipeValidation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipeController extends Controller
{
    use Paginator;

    /**
     * @var \Gousto\Repositories\RecipeRepository
     */
    protected $recipe;

    /**
     * @var \Gousto\Transformers\RecipeTransformer
     */
    protected $transformer;

    /**
     * @var \Gousto\Validations\RecipeValidation
     */
    private $validation;

    /**
     * RecipeController constructor.
     *
     * @param \Gousto\Repositories\RecipeRepository $recipe
     * @param \Gousto\Transformers\RecipeTransformer $transformer
     * @param \Gousto\Validations\RecipeValidation $validation
     */
    public function __construct(RecipeRepository $recipe, RecipeTransformer $transformer, RecipeValidation $validation)
    {
        $this->recipe = $recipe;
        $this->transformer = $transformer;
        $this->validation = $validation;
    }

    /**
     * Return all Recipes
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->perPage = $request->get('per_page') ?: $this->perPage;
        $recipes = $this->recipe->findBy($request->except($this->excludes), $this->perPage);

        return $this->paginate($recipes);
    }

    /**
     * Return a single Recipe
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $recipe = $this->recipe->find($id);
        return fractal()->item($recipe, $this->transformer)->respond();
    }

    /**
     * Store a new Recipe in storage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validation->rules());

        $this->recipe->create($request->all());
        return response()->json([
            'message' => 'Recipe created successfully'
        ], Response::HTTP_CREATED);
    }

    /**
     * Partially Update a Recipe
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if (empty($request->all())) {
            return response()->json(['message' => 'Missing update fields'], Response::HTTP_BAD_REQUEST);
        }

        $updateFieldRules = array_intersect_key($this->validation->rules(), $request->all());

        $this->validate($request, $updateFieldRules);

        $status = $this->recipe->update($id, $request->all());

        if (!$status) {
            return response()->json(['message' => 'Failed updating recipe'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json([
            'message' => 'Recipe updated successfully'
        ], Response::HTTP_OK);
    }
}