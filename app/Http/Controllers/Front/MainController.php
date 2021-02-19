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
        return MenuCategory::all();
    }

    public function mainBanners()
    {
        return MainBanner::all();
    }

    public function logo()
    {
        return Contact::where('key', 'logo')->pluck('img')->first();
    }

    public function phone()
    {
        return Contact::where('key', 'phone')->pluck('value')->first();
    }

    public function time()
    {
        return Contact::where('key', 'time')->pluck('value')->first();
    }

    public function links()
    {
        $links = [];
        $links['allatra'] = Contact::where('key', 'allatra')->pluck('value')->first();
        $links['vk'] = Contact::where('key', 'vk')->pluck('value')->first();
        $links['instagram'] = Contact::where('key', 'instagram')->pluck('value')->first();

        return $links;
    }
}
