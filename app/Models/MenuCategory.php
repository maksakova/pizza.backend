<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'img',
    ];

    public function menuProducts()
    {
        return $this->hasMany('App\Models\MenuProduct', 'menu_category_id');
    }
}
