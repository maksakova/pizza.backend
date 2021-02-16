<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuFiltersSeeder extends Seeder
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
            'name' => 'Вегетарианские',
            'slug' => 'veg',
            'img'  => '/img/common/veg.svg',
        ];
        $inputs[] = [
            'name' => 'Острые',
            'slug' => 'hot',
            'img'  => '/img/common/hot.svg',
        ];
        DB::table('menu_filters')->insert($inputs);
    }
}
