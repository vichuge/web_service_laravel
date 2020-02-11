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

Route::get('/', 'InicioController@index');

Route::get('/create','InicioController@create');
Route::post('/store','InicioController@store');

Route::get('/edit/{id}','InicioController@edit')->where(['id'=>'[0-9]+']);
Route::post('/update/{id}','InicioController@update')->where(['id'=>'[0-9]+']);

Route::get('/delete/{id}','InicioController@destroy')->where(['id'=>'[0-9]+']);