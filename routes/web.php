<?php

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

$router->get('project/','ProjectController@index');
$router->post('project/store','ProjectController@store');
$router->get('project/{id}','ProjectController@find');
$router->patch('project/update/{id}','ProjectController@update');
$router->delete('project/delete/{id}','ProjectController@destroy');
