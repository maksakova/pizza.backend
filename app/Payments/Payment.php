<?php


namespace App\Payments;


use App\Models\Order;

abstract class Payment
{

    protected $view;


    /**
     * return html form
     * @param $order Order
     * @param $mode string  live or sandbox
     * @param string $currency
     * @return string
     */
    public abstract function render($order, $mode = 'sandbox' , $currency = 'USD');


    /**
     * @param $externalId  order id from payment server
     * @param string $mode
     * @return mixed
     */
    public abstract function getOrder($externalId, $mode = "sandbox");

}