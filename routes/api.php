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



Route::post('login', 'AuthController@login');

/*Route::post('/invoices', 'ApiController@store');

Route::get('/invoice/{id}', 'ApiController@test');*/

Route::group([
    'middleware' => 'auth:api'
    ], function() {

    Route::post('/invoices', 'ApiController@store');

    Route::get('/invoice/{id}', 'ApiController@test');

    });

