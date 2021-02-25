<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MainBanner;
use App\Models\MenuCategory;
use App\Models\MenuFilter;
use App\Models\MenuIngredient;
use App\Models\MenuProduct;

class MainController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    /* API functions */

    public function menuCategories()
    {
        return MenuCategory::all();
    }

    public function mainBanners()
    {
        return MainBanner::all();
    }

    public function filters()
    {
        return MenuFilter::all();
    }

    public function products()
    {
        return MenuProduct::with('menuCategory')->with('menuFilter')->with('productVariants')->get();
    }

    public function randomProducts()
    {
        return MenuProduct::with('menuCategory')->with('menuFilter')->with('productVariants')->inRandomOrder()->limit(3)->get();
    }

    public function ingredients()
    {
        return MenuIngredient::with('menuIngredientGroup')->get();
    }
}
