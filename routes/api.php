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

Route::post('filters', '\App\Http\Controllers\Front\MainController@filters');

Route::post('products', '\App\Http\Controllers\Front\MainController@products');

Route::post('ingredients', '\App\Http\Controllers\Front\MainController@ingredients');
