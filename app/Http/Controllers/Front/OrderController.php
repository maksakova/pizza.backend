<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index($mode = 'sandbox', $currency = 'BYN')
    {
        $wsb_seed = time();
        $wsb_storeid = 378032762;
        $wsb_order_num = strtotime("now");
        $wsb_test = $mode == 'sandbox' ? 1 : 0;
        $wsb_notify_url = route('front.orders.store');
        $wsb_currency_id = $currency;
        $wsb_total = 20;
        $secretKey = 'CLoQTqNiRnLpjkJW1rdS';

        $wsb_signature = sha1($wsb_seed . $wsb_storeid . $wsb_order_num . $wsb_test . $wsb_currency_id . $wsb_total . $secretKey);
        return view('front.order', [
            'url' => config('payment.webpay.' . $mode . '.url'),
            'mode' => $mode,
            'wsb_seed' => $wsb_seed,
            'wsb_storeid' => $wsb_storeid,
            'wsb_order_num' => $wsb_order_num,
            'wsb_test' => $wsb_test,
            'wsb_notify_url' => $wsb_notify_url,
            'wsb_currency_id' => $wsb_currency_id,
            'wsb_total' => $wsb_total,
            'secretKey' => $secretKey,
            'wsb_signature' => $wsb_signature,

            'returnUrl' => route('front.orders.store')

        ])->render();
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
            'callback' => $request->callback,
            'unique' => null,
            'payment_status' => null
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
