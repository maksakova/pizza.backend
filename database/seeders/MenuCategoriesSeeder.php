<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriesSeeder extends Seeder
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
            'name' => 'Пицца',
            'slug' => 'pizza',
            'img'  => '/img/menu/1-pizza.svg',
        ];
        $inputs[] = [
            'name' => 'Суши',
            'slug' => 'sushi',
            'img'  => '/img/menu/2-sushi.svg',
        ];
        $inputs[] = [
            'name' => 'WOK',
            'slug' => 'wok',
            'img'  => '/img/menu/3-wok.svg',
        ];
        $inputs[] = [
            'name' => 'Обеды',
            'slug' => 'dinner',
            'img'  => '/img/menu/4-dinner.svg',
        ];
        $inputs[] = [
            'name' => 'Хачапури',
            'slug' => 'khachapuri',
            'img'  => '/img/menu/5-khachapury.svg',
        ];
        $inputs[] = [
            'name' => 'Пирожки',
            'slug' => 'pies',
            'img'  => '/img/menu/6-pie.svg',
        ];
        $inputs[] = [
            'name' => 'Десерты',
            'slug' => 'cake',
            'img'  => '/img/menu/7-cake.svg',
        ];
        $inputs[] = [
            'name' => 'Напитки',
            'slug' => 'drink',
            'img'  => '/img/menu/8-drink.svg',
        ];
        DB::table('menu_categories')->insert($inputs);
    }
}
