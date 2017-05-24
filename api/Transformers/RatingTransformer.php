<?php

namespace Gousto\Transformers;

use Gousto\Models\Rating;
use League\Fractal\TransformerAbstract;

/**
 * Class RatingTransformer
 *
 * @package Gousto\Transformers
 */
class RatingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param \Gousto\Models\Rating $rating
     * @return array
     */
    public function transform(Rating $rating)
    {
        return [
            'id' => $rating->id,
            'recipe_id' => (int) $rating->recipe_id,
            'rating' => (int) $rating->rating,
            'created_at' => $rating->created_at,
            'updated_at' => $rating->updated_at
        ];
    }
}
