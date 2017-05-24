<?php

$app->group(['prefix' => 'api/v1', 'namespace' => '\Gousto\Http\Controllers'], function () use ($app) {
    $app->get('recipes', 'RecipeController@index');
    $app->get('recipes/{id}', 'RecipeController@show');
    $app->post('recipes', 'RecipeController@store');
    $app->patch('recipes/{id}', 'RecipeController@update');

    $app->get('recipes/{recipe_id}/ratings', 'RatingController@index');
    $app->post('recipes/{recipe_id}/ratings', 'RatingController@store');
});