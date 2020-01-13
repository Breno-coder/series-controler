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

Route::get('/', 'seriesController@index')->name('/');
Route::get('/series/adicionar', 'seriesController@create')->name('adicionaserie');
Route::post('/series/adicionar', 'seriesController@store');
Route::delete('/remover/{id}', 'seriesController@destroy')->name('remover');
Route::get('/temporadas/{id}', 'temporadaController@index')->name('temporadas');
Route::post('/editar/{id}', 'seriesController@update');
Route::get('/ep/{id}', 'episodiosController@index')->name('ep');