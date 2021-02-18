<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::orderBy('id', 'DESC')->get();

        return view('front.discounts', [
            'discounts' => $discounts,
        ]);
    }
}
