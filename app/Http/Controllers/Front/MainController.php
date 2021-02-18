<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MainBanner;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
}
