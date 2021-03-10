<?php

namespace App\Payments\WebPay;

use App\Models\Order;
use App\Payments\IRenderable;
use App\Payments\Payment;

class WebPay extends Payment
{
    protected $view = 'payments.webpay';

    /**
     * return html form
     * @param $order Order
     * @param $mode string  live or sandbox
     * @param string $currency
     * @return string
     * @throws \Throwable
     */
    public function render($order, $mode = 'sandbox', $currency = 'BYN')
    {
        $wsb_seed = time();
        $wsb_storeid = config('payment.webpay.' . $mode . '.wsb_storeid');
        $wsb_order_num = $order->slug;
        $wsb_test = $mode == 'sandbox' ? 1 : 0;
        $wsb_notify_url = route('payment.webpay.callback');
        $wsb_currency_id = $currency;
        $wsb_total = $order->price;
        $secretKey = config('payment.webpay.secret_key');

        $wsb_signature = sha1($wsb_seed . $wsb_storeid . $wsb_order_num . $wsb_test . $wsb_currency_id . $wsb_total . $secretKey);
        return view($this->view, [
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

            'returnUrl' => route('/order')

        ])->render();
    }


    /**
     * @param $externalId string  order id from payment server
     * @param string $mode
     * @return mixed
     */
    public function getOrder($externalId, $mode = "sandbox")
    {

        $login = config('payment.webpay.login');
        $password = md5(config('payment.webpay.password'));

        $postdata = "*API=&API_XML_REQUEST=" . urlencode("<?xml version='1.0' encoding='ISO-8859-1' ?>
        <wsb_api_request>
         <command>get_transaction</command>
         <authorization>
         <username>{$login}</username>
        <password>{$password}</password>
         </authorization>
        <fields>
         <transaction_id>" . $externalId . "</transaction_id>
        </fields>
        </wsb_api_request>
                ");

        $curl = curl_init(config('payment.webpay.' . $mode . '.checkPaymentUrl'));
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}






















