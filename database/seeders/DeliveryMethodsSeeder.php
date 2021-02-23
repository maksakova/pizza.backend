<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMethodsSeeder extends Seeder
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
            'name'   => 'Привезите',
            'active' => 1,
        ];
        $inputs[] = [
            'name'   => 'Самовывоз',
            'active' => 1,
        ];
        DB::table('delivery_methods')->insert($inputs);
    }
}
