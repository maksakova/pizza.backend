<?php

use Illuminate\Support\Facades\Route;
use App\Models\Discount;

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

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');


/* Admin */

Route::resource('/admin/menu-categories', 'Admin\MenuCategoryController')
    ->names('admin.menu-categories')
    ->middleware('auth');

Route::resource('/admin/menu-products', 'Admin\MenuProductController')
    ->names('admin.menu-products')
    ->middleware('auth');

Route::resource('/admin/menu-filters', 'Admin\MenuFilterController')
    ->names('admin.menu-filters')
    ->middleware('auth');

Route::resource('/admin/menu-ingredient-groups', 'Admin\MenuIngredientGroupController')
    ->names('admin.menu-ingredient-groups')
    ->middleware('auth');

Route::resource('/admin/menu-ingredients', 'Admin\MenuIngredientController')
    ->names('admin.menu-ingredients')
    ->middleware('auth');

Route::resource('/admin/main-banners', 'Admin\MainBannerController')
    ->names('admin.main-banners')
    ->middleware('auth');

Route::resource('/admin/discounts', 'Admin\DiscountController')
    ->names('admin.discounts')
    ->middleware('auth');

Route::resource('/admin/contacts', 'Admin\ContactController')
    ->names('admin.contacts')
    ->middleware('auth');


/* Front */

Route::get('/', 'Front\MainController@index');
Route::get('/map', function () {return view('front.map', );})->name('map');
Route::get('/howto', function () {return view('front.howto', );})->name('howto');
Route::get('/contacts', function () {return view('front.contacts', );})->name('contacts');

/* Discounts */

Route::get('discounts', 'Front\DiscountController@index')->name('discounts');

Discount::all()->each(function ($discount) {
    Route::get('discounts/' . $discount->slug, function () use ($discount) {
        $discounts = Discount::where('id', '!=' , $discount->id)->orderBy('id', 'DESC')->take(3)->get();

        return view('front.discount-item', [
            'discount' => $discount,
            'discounts' => $discounts,
        ]);
    })->name('discount.' . $discount->slug);
});
