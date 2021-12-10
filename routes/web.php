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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', 'todosController@index');
Route::get('/todos/{id}', 'todosController@show');
Route::get('/create', 'todosController@create');
Route::post('/create', 'todosController@store');
Route::get('/todos/{id}/edit', 'todosController@edit');
Route::post('/todos/{id}', 'todosController@update');
Route::get('/todos/{id}/delete', 'todosController@destroy');
Route::get('/todos/{id}/complete', 'todosController@complete');
