<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMethod;
use App\Models\MainBanner;
use App\Models\MenuCategory;
use App\Models\MenuFilter;
use App\Models\MenuIngredient;
use App\Models\MenuProduct;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Setting;
use Illuminate\Http\Request;

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

    public function products(Request $request)
    {
        if ($request->category) {
            $menuCategory = MenuCategory::where('slug', $request->category)->first();
            return MenuProduct::with('menuCategory')->with('menuFilter')->with('productVariants')->where('menu_category_id', $menuCategory->id)->get();
        } else {
            return MenuProduct::with('menuCategory')->with('menuFilter')->with('productVariants')->where('menu_category_id', 1)->get();
        }
    }

    public function randomProducts()
    {
        return MenuProduct::with('menuCategory')->with('menuFilter')->with('productVariants')->inRandomOrder()->limit(3)->get();
    }

    public function ingredients()
    {
        return MenuIngredient::with('menuIngredientGroup')->get();
    }

    public function deliveryMethods()
    {
        return DeliveryMethod::where('active', 1)->get();
    }

    public function paymentMethods()
    {
        return PaymentMethod::where('active', 1)->get();
    }

    public function settings()
    {
        return Setting::all()->keyBy('key');
    }

}
