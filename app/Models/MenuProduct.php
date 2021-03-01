<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuProduct extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'menu_category_id',
        'menu_filter_id',
        'ingredients',
        'composition',
        'weight',
        'min_price',
        'variants_show',
        'img'
    ];

    public function menuCategory()
    {
        return $this->belongsTo('App\Models\MenuCategory', 'menu_category_id');
    }

    public function menuFilter()
    {
        return $this->belongsTo('App\Models\MenuFilter', 'menu_filter_id');
    }

    public function productVariants()
    {
        return $this->hasMany('App\Models\MenuProductVariant', 'menu_product_id');
    }
}
