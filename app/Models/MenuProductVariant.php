<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuProductVariant extends Model
{

    protected $fillable = [
        'name',
        'menu_product_id',
        'menu_variant_id',
        'price',
        'weight',
    ];

    public function menuCategory()
    {
        return $this->belongsTo('App\Models\MenuVariant', 'menu_variant_id');
    }

    public function menuProduct()
    {
        return $this->belongsTo('App\Models\menuProduct', 'menu_product_id');
    }
}
