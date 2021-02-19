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

Route::post('menuCategories', '\App\Http\Controllers\Front\MainController@menuCategories');

Route::post('mainBanners', '\App\Http\Controllers\Front\MainController@mainBanners');

Route::post('logo', '\App\Http\Controllers\Front\MainController@logo');

Route::post('phone', '\App\Http\Controllers\Front\MainController@phone');

Route::post('time', '\App\Http\Controllers\Front\MainController@time');
