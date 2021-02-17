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
            'img'  => '/img/uploads/1-pizza.svg',
        ];
        $inputs[] = [
            'name' => 'Суши',
            'slug' => 'sushi',
            'img'  => '/img/uploads/2-sushi.svg',
        ];
        $inputs[] = [
            'name' => 'WOK',
            'slug' => 'wok',
            'img'  => '/img/uploads/3-wok.svg',
        ];
        $inputs[] = [
            'name' => 'Обеды',
            'slug' => 'dinner',
            'img'  => '/img/uploads/4-dinner.svg',
        ];
        $inputs[] = [
            'name' => 'Хачапури',
            'slug' => 'khachapuri',
            'img'  => '/img/uploads/5-khachapury.svg',
        ];
        $inputs[] = [
            'name' => 'Пирожки',
            'slug' => 'pies',
            'img'  => '/img/uploads/6-pie.svg',
        ];
        $inputs[] = [
            'name' => 'Десерты',
            'slug' => 'cake',
            'img'  => '/img/uploads/7-cake.svg',
        ];
        $inputs[] = [
            'name' => 'Напитки',
            'slug' => 'drink',
            'img'  => '/img/uploads/8-drink.svg',
        ];
        DB::table('menu_categories')->insert($inputs);
    }
}
