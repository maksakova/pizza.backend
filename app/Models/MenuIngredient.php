<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuIngredient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'menu_category_id',
        'menu_ingredient_group_id',
        'img',
    ];

    public function menuIngredientGroup()
    {
        return $this->belongsTo('App\Models\MenuIngredientGroup', 'menu_ingredient_group_id');
    }
}
