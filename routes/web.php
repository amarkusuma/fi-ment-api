<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

$router->get('/todo', 'todoController@index');
$router->get('/todo/{id}', 'todoController@show');
$router->post('/todo/save', 'todoController@store');
$router->post('/todo/{id}/update', 'todoController@update');
$router->post('/todo/{id}/delete', 'todoController@destroy');

$router->get('/get-barang', 'BarangController@index');
$router->post('/add-barang', 'BarangController@add');

$router->get('/pengeluaran', 'PengeluaranController@index');
$router->post('/add-pengeluaran', 'PengeluaranController@add');
$router->post('/show-pengeluaran', 'PengeluaranController@show');
$router->post('/update-pengeluaran', 'PengeluaranController@update');
$router->post('/delete-pengeluaran', 'PengeluaranController@delete');

$router->get('/random-key', function () {

    return Str::random(64);

});

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    $router->post('register', 'AuthController@register');

    $router->post('login', 'AuthController@login');
 
});

$router->get('/login', function (Request $request) {
    $token = app('auth')->attempt($request->only('email', 'password'));
 
    return response()->json(compact('token'));
});
