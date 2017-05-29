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

Route::get('/', 'SuggestionsController@index');
Route::post('/suggestions', 'SuggestionsController@store');

Route::get('/skills', function() {
    return ['Laravel', 'JavaScript', 'PHP', 'Tooling', 'Vue'];
});