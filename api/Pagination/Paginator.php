<?php

namespace Gousto\Pagination;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

/**
 * Trait Paginator
 *
 * @package Gousto\Pagination
 */
trait Paginator
{
    /**
     * Items to show Per Page
     * @var int
     */
    protected $perPage = 10;

    /**
     * Exclude the following words from Request parameters
     * @var array
     */
    protected $excludes = [
        'page',
        'per_page'
    ];


    /**
     * @param \Illuminate\Contracts\Pagination\LengthAwarePaginator $items
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(LengthAwarePaginator $items)
    {
        $queryParams = array_diff_key($_GET, array_flip(['page']));
        $items->appends($queryParams);
        $collection = $items->getCollection();

        return fractal()
            ->collection($collection)
            ->transformWith($this->transformer)
            ->paginateWith(new IlluminatePaginatorAdapter($items))
            ->respond();
    }
}