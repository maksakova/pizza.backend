<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
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
            'name' => 'Новый',
        ];
        $inputs[] = [
            'name' => 'Принят',
        ];
        $inputs[] = [
            'name' => 'Оплачен',
        ];
        $inputs[] = [
            'name' => 'Передан курьеру',
        ];
        $inputs[] = [
            'name' => 'Доставлен',
        ];
        $inputs[] = [
            'name' => 'Отменен',
        ];
        DB::table('order_statuses')->insert($inputs);
    }
}
