<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index()
    {
        return view('front.order');
    }

    public function create(Request $request)
    {
        $order = new order();
        return view('front.success', [
            'order' => $order,
        ]);

    }

    public function store(Request $request)
    {
        $order = Order::create([
            'products' => $request->products,
            'cart_total' => $request->cart_total,
            'delivery_method' => $request->delivery_method,
            'delivery_price' => $request->delivery_price,
            'payment_method' => $request->payment_method,
            'cashback' => $request->cashback,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'street' => $request->street,
            'building' => $request->building,
            'flat' => $request->flat,
            'entrance' => $request->entrance,
            'floor' => $request->floor,
            'code' => $request->code,
            'comment' => $request->comment,
            'status_id' => 1,
            'callback' => $request->callback
        ]);
        $order->save();

        if ($order) {
            return redirect()->route('success', ['order=' . $order->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
