<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@welcome');

Route::get('/library', 'MusicController@library');

Route::get('/add', 'PageController@add');
Route::post('/library', 'MusicController@add');

Route::get('/genres', 'MusicController@genres');
Route::post('/genres/add', 'MusicController@addGenre');
Route::post('/genres/{id}', 'MusicController@updateGenre');

Route::get('/contact', 'PageController@contact');

// get the route to edit a song

Route::get('/songs/{id}/edit', 'MusicController@edit');

Route::put('/songs/{id}','MusicController@update');

// separate page for delete verification

Route::get('/songs/{id}/delete', 'MusicController@delete');

Route::put('/songs/{id}/kill','MusicController@kill');
