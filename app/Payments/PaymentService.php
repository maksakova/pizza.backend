<?php


namespace App\Payments;


use App\Payments\WebPay\WebPay;

/**
 * Class PaymentService
 * @package App\Payments
 * @property WebPay $webpay
 */
class PaymentService
{

    private $classMap = [
        'webpay' => WebPay::class
    ];

    public function __get($name)
    {

        $this->checkExistClass($name);

        return new $this->classMap[$name];
    }


    /**
     * @param $name
     * @throws Exception
     */
    private function checkExistClass($name): void
    {
        if (!array_key_exists($name, $this->classMap)) {
            throw new Exception('Payment not found');
        }
    }


}