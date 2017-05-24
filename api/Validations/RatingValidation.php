<?php

namespace Gousto\Validations;

class RatingValidation extends Validation
{
    protected $rules = [
        'rating' => 'required|numeric|min:1|max:5'
    ];
}