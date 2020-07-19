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



Route::post('/decrypt/data/cart', 'User\HelperController@decryptCartData');
Route::post('/decrypt/cart', 'User\HelperController@decryptCart');
Route::post('/encrypt/cart', 'User\HelperController@encyptCart');

