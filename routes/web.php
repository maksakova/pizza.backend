<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuCategoryController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
