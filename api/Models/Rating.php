<?php

namespace Gousto\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are protected against mass assignment.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $table = 'ratings';

    /**
     * Disable automatic mutation of date timestamp into a Carbon instance
     *
     * @return array
     */
    public function getDates()
    {
        return [];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}