<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp;
use Illuminate\Support\Facades\Log;

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

            'returnUrl' => route('front.success')

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
        if ($request->callback == 'false') {
            $request->callback = 0;
        }
        $wsb_seed = time();

        $order = Order::create([
            'products' => $request->products,
            'cart_total' => $request->cart_total,
            'delivery_method' => $request->delivery_method,
            'delivery_price' => $request->delivery_price,
            'payment_method' => $request->payment_method,
            'cashback' => $request->cashBackValue,
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
            'unique' => $wsb_seed,
            'payment_status' => null
        ]);
        $order->save();

        if ($request->payment_method == 1) {
            return redirect()->route('success', ['order=' . $order->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            $mode = 'sandbox';
            $currency = 'BYN';
            $wsb_storeid = 378032762;
            $wsb_order_num = strtotime("now");
            $wsb_test = $mode == 'sandbox' ? 1 : 0;
            $wsb_notify_url = route('front.orders.store');
            $wsb_currency_id = $currency;
            $wsb_total = $request->cart_total;
            $secretKey = 'CLoQTqNiRnLpjkJW1rdS';

            $wsb_signature = sha1($wsb_seed . $wsb_storeid . $wsb_order_num . $wsb_test . $wsb_currency_id . $wsb_total . $secretKey);

            return view('front.waiting', [
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

                'returnUrl' => route('front.success')

            ])->render();
        }
    }

    public function callback(Request $request)
    {
        $item = Order::where('unique', $request->wsb_order_num)->first();

        $item->payment_status = $request->wsb_tid;

        $item->save();

        return view('front.success', [
            'request' => $request,
        ]);


        /*Log::info('callback webpay', [$request->all()]);

        if ($request->has('site_order_id')) {

            $formedUserAccount = FormedUserAccount::whereSlug($request->get('site_order_id'))->first();
            $successPaymentStatuses = [1, 4, 10];

            if (in_array($request->payment_type, $successPaymentStatuses)) {

                //если еще не перевели деньги
                if (!$formedUserAccount->external_id) {
                    $updatedData = [
                        'external_id' => $request->get('transaction_id'),
                        'payment_status_id' => 2
                    ];
                    $user = User::whereId($formedUserAccount->user_id)->first();

                    if ($user) {
                        $user->balance()->increment('balance', $request->amount);
                    }

                } else {
                    $updatedData = [
                        'external_id' => $request->get('transaction_id'),
                        'payment_status_id' => 3
                    ];
                }

                $formedUserAccount->update($updatedData);
            }
        }

        return http_response_code(200);*/
    }
}
