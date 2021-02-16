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
        'ingredients' => 'boolean',
        'composition',
        'min_price',
        'variants_show' => 'boolean',
        'img'
    ];

    public function menuCategory()
    {
        return $this->belongsTo('App\Models\MenuCategory', 'menu_category_id');
    }
}
