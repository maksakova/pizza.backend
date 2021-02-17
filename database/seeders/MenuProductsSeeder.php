<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuProductsSeeder extends Seeder
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
            'name'             => 'Капричезе',
            'menu_category_id' => 1,
            'menu_filter_id'   => 2,
            'ingredients'      => true,
            'composition'      => '',
            'min_price'        => 25.40,
            'variants_show'    => false,
            'img'              => '/img/uploads/pizza-1.jpg',
        ];
        $inputs[] = [
            'name'             => 'Маргарита',
            'menu_category_id' => 1,
            'menu_filter_id'   => 1,
            'ingredients'      => true,
            'composition'      => '',
            'min_price'        => 20,
            'variants_show'    => false,
            'img'              => '/img/uploads/pizza-2.jpg',
        ];
        $inputs[] = [
            'name'             => 'Хачапури по-Аджарски',
            'menu_category_id' => 5,
            'menu_filter_id'   => null,
            'ingredients'      => true,
            'composition'      => 'Сыр Адыгейский, сыр Сулугуни, сливки, желток, масло сливочное. ',
            'min_price'        => 2.50,
            'variants_show'    => false,
            'img'              => '/img/uploads/khachapuri.jpg',
        ];
        DB::table('menu_products')->insert($inputs);
    }
}
