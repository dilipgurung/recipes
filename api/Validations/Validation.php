<?php

namespace Gousto\Validations;

abstract class Validation
{
    /**
     * Get the validation rules
     *
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }
}