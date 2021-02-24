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
            'composition'      => null,
            'min_price'        => 25.40,
            'variants_show'    => false,
            'img'              => '/img/uploads/pizza-1.jpg',
        ];
        $inputs[] = [
            'name'             => 'Маргарита',
            'menu_category_id' => 1,
            'menu_filter_id'   => 1,
            'composition'      => null,
            'min_price'        => 20,
            'variants_show'    => false,
            'img'              => '/img/uploads/pizza-2.jpg',
        ];
        $inputs[] = [
            'name'             => 'Хачапури по-Аджарски',
            'menu_category_id' => 5,
            'menu_filter_id'   => null,
            'composition'      => 'Сыр Адыгейский, сыр Сулугуни, сливки, желток, масло сливочное. ',
            'min_price'        => 2.50,
            'variants_show'    => true,
            'img'              => '/img/uploads/khachapuri.jpg',
        ];
        $inputs[] = [
            'name'             => 'Цыпленок Песто',
            'menu_category_id' => 1,
            'menu_filter_id'   => null,
            'composition'      => '',
            'min_price'        => 14.50,
            'variants_show'    => false,
            'img'              => '/img/uploads/tsyplenok-pesto-2.jpg',
        ];
        $inputs[] = [
            'name'             => 'Филадельфия маки',
            'menu_category_id' => 2,
            'menu_filter_id'   => null,
            'composition'      => 'Рис, сыр сливочный, лосось. 260гр.(8шт.)',
            'min_price'        => 14,
            'variants_show'    => true,
            'img'              => '/img/uploads/filadelfiya-maki.jpg',
        ];
        $inputs[] = [
            'name'             => 'Драники картофельные',
            'menu_category_id' => 4,
            'menu_filter_id'   => null,
            'composition'      => 'Драники из картофеля со сметаной',
            'min_price'        => 4.20,
            'variants_show'    => true,
            'img'              => '/img/uploads/draniki-kartofelnye.jpg',
        ];
        $inputs[] = [
            'name'             => 'Лапша с курицей в соусе терияки',
            'menu_category_id' => 3,
            'menu_filter_id'   => null,
            'composition'      => '',
            'min_price'        => 10,
            'variants_show'    => false,
            'img'              => '/img/uploads/kuritsa_r1.jpg',
        ];
        DB::table('menu_products')->insert($inputs);
    }
}
