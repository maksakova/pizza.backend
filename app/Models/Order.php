<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products',
        'cart_total',
        'delivery_method',
        'delivery_price',
        'payment_method',
        'cashback',
        'user_id',
        'name',
        'phone',
        'email',
        'street',
        'building',
        'flat',
        'entrance',
        'floor',
        'code',
        'comment',
        'status_id',
        'callback',
        'unique',
        'payment_status',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'status_id');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo('App\Models\DeliveryMethod', 'delivery_method');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod', 'payment_method');
    }
}
