<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuFilter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'img',
    ];
}
