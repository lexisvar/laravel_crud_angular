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
    return view('index');
});

Route::get('api/cliente/{cliente_id?}','ClienteController@index');
Route::post('api/cliente/','ClienteController@store');
Route::post('api/cliente/{cliente_id}','ClienteController@update');
Route::delete('api/cliente/{cliente_id}','ClienteController@destroy');
