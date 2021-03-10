<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuIngredientGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [];
        $inputs[] = [
            'name'      => 'Мясо',
            'slug'      => 'meat',
            'min_price' => 1.90,
            'mid_price' => 2.50,
            'max_price' => 3.20
        ];
        $inputs[] = [
            'name'      => 'Морепродукты',
            'slug'      => 'seafood',
            'min_price' => 2.90,
            'mid_price' => 4.00,
            'max_price' => 5.20
        ];
        $inputs[] = [
            'name'      => 'Сыры',
            'slug'      => 'cheese',
            'min_price' => 1.90,
            'mid_price' => 2.50,
            'max_price' => 3.20
        ];
        $inputs[] = [
            'name'      => 'Грибы и овощи',
            'slug'      => 'vegetables',
            'min_price' => 1.50,
            'mid_price' => 2.00,
            'max_price' => 3.00
        ];
        $inputs[] = [
            'name'      => 'Соусы',
            'slug'      => 'souces',
            'min_price' => 1.50,
            'mid_price' => 2.00,
            'max_price' => 3.00
        ];
        $inputs[] = [
            'name'      => 'Другое',
            'slug'      => 'other',
            'min_price' => 1.50,
            'mid_price' => 2.00,
            'max_price' => 3.00
        ];
        DB::table('menu_ingredient_groups')->insert($inputs);
    }
}
