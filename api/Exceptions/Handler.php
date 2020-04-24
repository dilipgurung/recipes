<?php

namespace Gousto\Exceptions;

use App\Exceptions\Handler as BaseHandler;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends BaseHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof HttpException) {
            return response()->json([
                'message' => 'Requested Endpoint Not Found',
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Requested Model Not Found',
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ValidationException) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $e->getResponse(),
            ], Response::HTTP_BAD_REQUEST);
        }

        return parent::render($request, $e);
    }
}
