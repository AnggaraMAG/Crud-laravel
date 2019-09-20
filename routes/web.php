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

Route::get('/crud', 'CrudController@index');
Route::get('/create', 'CrudController@create');
Route::post('/crud', 'CrudController@store');
Route::get('/detail/{siswa}', 'CrudController@show');
Route::delete('/crud/{siswa}', 'CrudController@destroy');
Route::get('/crud/edit/{siswa}', 'CrudController@edit');
Route::patch('/crud/{siswa}', 'CrudController@update');
