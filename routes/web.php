<?php

$app->group(
    [
        'prefix' => 'api/v1',
        'namespace' => '\Gousto\Http\Controllers',
    ],
    function () use ($app) {
        /*
        |--------------------------------------------------------------------------
        | Recipe Routes
        |--------------------------------------------------------------------------
        |
        | Available HTTP Methods are GET, POST, PUT, PATCH
        |
        */
        $app->get('recipes', 'RecipeController@index');
        $app->get('recipes/{id}', 'RecipeController@show');
        $app->post('recipes', 'RecipeController@store');
        $app->put('recipes/{id}', 'RecipeController@update');
        $app->patch('recipes/{id}', 'RecipeController@patch');

    });