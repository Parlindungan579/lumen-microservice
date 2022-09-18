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


//Generate Application Key
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->post('/register','UserController@register');
$router->post('/login','UserController@login');
$router->get('/user','UserController@index');

$router->get('/api/posts', 'PostController@index');
$router->post('/api/posts', 'PostController@store');
$router->get('/api/posts/{id}', 'PostController@show');
$router->put('/api/posts/{id}', 'PostController@update');
$router->delete('/api/posts/{id}', 'PostController@destroy');

$router->get('/api/categories', 'CategoryController@index');
$router->post('/api/categories', 'CategoryController@store');
$router->get('/api/categories/{id}', 'CategoryController@show');
$router->put('/api/categories/{id}', 'CategoryController@update');
$router->delete('/api/categories/{id}', 'CategoryController@destroy');

$router->get('/api/tags', 'TagController@index');
$router->post('/api/tags', 'TagController@store');
$router->get('/api/tags/{id}', 'TagController@show');
$router->put('/api/tags/{id}', 'TagController@update');
$router->delete('/api/tags/{id}', 'TagController@destroy');

$router->get('/products', "ProductController@select_view");
$router->get('/select/{name}', "MidtransController@create_transaction_view");

$router->group([ "middleware" => "midtrans" ], function () use ($router) {
    $router->get('/tx/status/{id}', "MidtransController@get_tx_status");
    $router->post('/tx/cancel/{id}', "MidtransController@cancel_tx");
    $router->post('/tx/create', "MidtransController@create_transaction");

    $router->get('/midtrans', function () {
        return config("app.midtrans");
    });
});

