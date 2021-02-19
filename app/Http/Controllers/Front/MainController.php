<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MainBanner;
use App\Models\MenuCategory;
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
        $menuCategories = MenuCategory::all();

        return $menuCategories;
    }

    public function mainBanners()
    {
        $mainBanners = MainBanner::all();

        return $mainBanners;
    }

    public function logo()
    {
        $logo = Contact::where('key', 'logo')->pluck('img')->first();

        return $logo;
    }
}
