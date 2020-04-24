<?php

namespace Gousto\Validations;

class RecipeValidation extends Validation
{
    protected $rules = [
        'box_type' => 'required|string',
        'title' => 'required|string',
        'slug' => 'required|string',
        'short_title' => 'required|string',
        'marketing_description' => 'required|string',
        'calories_kcal' => 'required|numeric',
        'protein_grams' => 'numeric',
        'fat_grams' => 'numeric',
        'carbs_grams' => 'numeric',
        'bulletpoint1' => 'string|nullable',
        'bulletpoint2' => 'string|nullable',
        'bulletpoint3' => 'string|nullable',
        'recipe_diet_type_id' => 'required|string',
        'season' => 'required|string',
        'base' => 'string',
        'protein_source' => 'string',
        'preparation_time_minutes' => 'required|numeric',
        'shelf_life_days' => 'required|numeric',
        'equipment_needed' => 'string',
        'origin_country' => 'string',
        'recipe_cuisine' => 'required|string',
        'in_your_box' => 'string',
        'gousto_reference' => 'required|integer',
    ];
}
