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

Route::post('randomProducts', '\App\Http\Controllers\Front\MainController@randomProducts');

Route::post('ingredients', '\App\Http\Controllers\Front\MainController@ingredients');

Route::post('deliveryMethods', '\App\Http\Controllers\Front\MainController@deliveryMethods');

Route::post('paymentMethods', '\App\Http\Controllers\Front\MainController@paymentMethods');

Route::any('newOrder', '\App\Http\Controllers\Front\MainController@newOrder');

Route::resource('/orders', '\App\Http\Controllers\Front\OrderController', [
    'only' => ['create']
]);
