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
     * @param  \Gousto\Models\Rating  $rating
     * @return array
     */
    public function transform(Rating $rating)
    {
        return [
            'rating_id' => $rating->id,
            'recipe' => $rating->recipe->title,
            'rating' => (int) $rating->rating,
            'created_at' => $rating->created_at->toFormattedDateString(),
        ];
    }
}
