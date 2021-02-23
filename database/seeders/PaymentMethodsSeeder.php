<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsSeeder extends Seeder
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
            'name'   => 'Наличными',
            'active' => 1,
        ];
        $inputs[] = [
            'name'   => 'ЕРИП',
            'active' => 1,
        ];
        $inputs[] = [
            'name'   => 'Webpay',
            'active' => 1,
        ];
        DB::table('payment_methods')->insert($inputs);
    }
}
