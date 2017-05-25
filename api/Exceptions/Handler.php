<?php

namespace Gousto\Exceptions;

use Exception;
use App\Exceptions\Handler as BaseHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Class Handler extends BaseHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof HttpException) {
            return response()->json([
                'message' => 'Requested Endpoint Not Found'
            ], 404);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Requested Model Not Found'
            ], 404);
        }

//        if ($e instanceof ValidationException) {
//            return response()->json([
//                'message' => 'Validation Failed'
//            ], 400);
//        }

        return parent::render($request, $e);
    }
}
