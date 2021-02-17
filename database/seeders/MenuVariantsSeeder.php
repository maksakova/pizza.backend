<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuVariantsSeeder extends Seeder
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
            'name' => 'Толщина теста',
        ];
        $inputs[] = [
            'name' => 'Диаметр пиццы',
        ];
        $inputs[] = [
            'name' => 'Вес',
        ];
        $inputs[] = [
            'name' => 'Способ обжарки',
        ];
        DB::table('menu_variants')->insert($inputs);
    }
}
