<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuIngredientGroup extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'min_price',
        'mid_price',
        'max_price',
    ];
}
