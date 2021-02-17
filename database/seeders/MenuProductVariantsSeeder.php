<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuProductVariantsSeeder extends Seeder
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
            'name'            => 'Традиционное',
            'menu_product_id' => 1,
            'menu_variant_id' => 1,
            'price'           => null,
            'weight'          => null,
        ];
        $inputs[] = [
            'name'            => 'Тонкое',
            'menu_product_id' => 1,
            'menu_variant_id' => 1,
            'price'           => null,
            'weight'          => null,
        ];
        $inputs[] = [
            'name'            => '25 см',
            'menu_product_id' => 1,
            'menu_variant_id' => 2,
            'price'           => 20,
            'weight'          => '360,420',
        ];
        $inputs[] = [
            'name'            => '30 см',
            'menu_product_id' => 1,
            'menu_variant_id' => 2,
            'price'           => 22.5,
            'weight'          => '400,520',
        ];
        $inputs[] = [
            'name'            => '35 см',
            'menu_product_id' => 1,
            'menu_variant_id' => 2,
            'price'           => 25,
            'weight'          => '560,620',
        ];
        DB::table('menu_product_variants')->insert($inputs);
    }
}
