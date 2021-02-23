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
        'status',
    ];
}
