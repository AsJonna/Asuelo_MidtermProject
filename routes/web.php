<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users', ['uses' => 'UserController@getUsers']);

//$router->get('/users_index', 'UserController@getindex']); 

$router->post('/users', ['uses' => 'UserController@add']);

$router->post('/users/search', ['uses' => 'UserController@search']);

$router->put('/users/{id}', ['uses' => 'UserController@update']);

$router->patch('/users/{id}', ['uses' => 'UserController@update']);

$router->delete('/users/{id}', ['uses' => 'UserController@delete']);
