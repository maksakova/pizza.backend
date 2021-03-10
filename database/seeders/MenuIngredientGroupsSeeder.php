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


        \DB::table('menu_ingredient_groups')->delete();

        \DB::table('menu_ingredient_groups')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Мясо',
                    'slug' => 'meat',
                    'min_price' => 1.9,
                    'mid_price' => 2.5,
                    'max_price' => 3.2,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Морепродукты',
                    'slug' => 'seafood',
                    'min_price' => 2.9,
                    'mid_price' => 4.0,
                    'max_price' => 5.2,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Сыры',
                    'slug' => 'cheese',
                    'min_price' => 1.9,
                    'mid_price' => 2.5,
                    'max_price' => 3.2,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Грибы и овощи',
                    'slug' => 'vegetables',
                    'min_price' => 1.5,
                    'mid_price' => 2.0,
                    'max_price' => 3.0,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Соусы',
                    'slug' => 'souces',
                    'min_price' => 1.5,
                    'mid_price' => 2.0,
                    'max_price' => 3.0,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Другое',
                    'slug' => 'other',
                    'min_price' => 1.5,
                    'mid_price' => 2.0,
                    'max_price' => 3.0,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
        ));


    }
}
