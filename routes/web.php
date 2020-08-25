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

// movies
$router->get('/', 'MovieController@index');
$router->get('/movie/create', 'MovieController@create');
$router->get('/movie/{id}/edit', 'MovieController@edit');
$router->get('/movie/{id}/delete', 'MovieController@confirmDelete');
$router->get('/movie/{id}', 'MovieController@show');


$router->post('/movies', 'MovieController@store');
$router->put('/movie/{id}', 'MovieController@update');
$router->put('/movie/{id}/delete', 'MovieController@delete');

// directors
$router->get('/directors', 'DirectorController@index');
$router->get('/director/create', 'DirectorController@create');
$router->get('/director/{id}', 'DirectorController@show');
$router->get('/director/{id}/delete', 'DirectorController@confirmDelete');

$router->post('/directors', 'DirectorController@store');
$router->post('/director/choose', 'DirectorController@choose');

$router->get('/director/{id}/edit', 'DirectorController@edit');
$router->put('/director/{id}', 'DirectorController@update');
$router->put('/director/{id}/delete', 'DirectorController@delete');

//genres
$router->get('/genre/create', 'GenreController@create');
$router->get('/genre/{name}', 'GenreController@show');
$router->get('/genre/{name}/delete', 'GenreController@confirmDelete');

$router->post('/genre/choose', 'GenreController@choose');
$router->post('/genres', 'GenreController@store');

$router->get('/genre/{name}/edit', 'GenreController@edit');
$router->put('/genre/{name}', 'GenreController@update');
$router->put('/genre/{name}/delete', 'GenreController@delete');

//search
$router->post('search', 'MovieController@prepareSearch');
$router->get('search/search', 'MovieController@search');

//error page
$router->get('/error', 'NotExistController@notFound');

