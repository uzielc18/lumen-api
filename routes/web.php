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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1,', function ($api) {
    $api->group(['prefix' => 'oauth'], function ($api) {
        $api->post('token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    });

    $api->group(['namespace' => 'App\Http\Controllers', 'middleware' => ['oauth:api', 'cors']], function ($api) {
        $api->get('users', 'UserController');

    });
});
/*$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {

    $api->get('/auth/token', 'AuthController@createToken');

    $api->patch('/auth/token', 'AuthController@refreshToken');

    $api->delete('/auth/token', 'AuthController@deleteToken');

    $api->group(['middleware' => 'auth:api'], function ($api) {

        $api->resource('users', 'UserController');
    });
});*/
