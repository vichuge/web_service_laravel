<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Agregamos nuestra ruta al controlador de Pokemons
//Route::resource('pokemons','PokemonController');

/*
{
	"email":"correo@c.com",
	"password":"3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79"
}
*/ 
//127.0.0.1:8000/api/pokemons/store
Route::post('pokemons/store','PokemonController@store');
//127.0.0.1:8000/api/pokemons/destroy/1
Route::post('pokemons/destroy/{id}','PokemonController@destroy')->where(['id'=>'[0-9]+']);
//127.0.0.1:8000/api/pokemons/update/1
Route::post('pokemons/update/{id}','PokemonController@update')->where(['id'=>'[0-9]+']);
//127.0.0.1:8000/api/pokemons/show/1
Route::post('pokemons/show/{id}','PokemonController@show')->where(['id'=>'[0-9]+']);
//127.0.0.1:8000/api/pokemons/list
Route::post('pokemons/list','PokemonController@list');


//Route::post('isloged','SesionController@isloged');
//Route::post('login','SesionController@login');
//Route::post('logout','SesionController@logout');