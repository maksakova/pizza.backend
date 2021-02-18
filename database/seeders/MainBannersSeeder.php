<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainBannersSeeder extends Seeder
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
            'img'  => '/img/uploads/banner1.jpg',
            'link' => '',
            'text' => '<div class="text1">СКИДКА <span>-20%</span></div><div class="text3">на самовывоз</div>'
        ];
        $inputs[] = [
            'img' => '/img/uploads/banner3.jpg',
            'link' => '',
            'text' => '<div class="text1">КОРПОРАТИВНОЕ <span>ПИТАНИЕ</span></div>'
        ];
        $inputs[] = [
            'img' => '/img/uploads/banner2.jpg',
            'link' => '',
            'text' => '<div class="text3">КУРЬЕРСКАЯ</div><div class="text1"><span>БЕСКОНТАКТНАЯ</span></div><div class="text3">ДОСТАВКА</div>'
        ];
        DB::table('main_banners')->insert($inputs);
    }
}
