<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('usuario/', 'UsuarioController@show');
Route::post("usuario" ,"UsuarioController@create");
Route::put("usuario/{id}","UsuarioController@update");
Route::delete("usuario/{id}","UsuarioController@destroy");
Route::get("confirmar/{id}","UsuarioController@confirmar");
