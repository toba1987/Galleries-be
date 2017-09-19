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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@authenticate');

Route::post('register', 'RegisterController@store');
//Route::middleware('jwt.auth')->post('register', 'RegisterController@store');

Route::get('users/{users}/galleries', 'UserGalleryControler@show');

Route::get('galleries', 'GalleryController@index');
Route::get('gallery/{id}', 'GalleryController@show');

Route::get('search/{term}', 'GalleryController@search');
