<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
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
            'name'  => 'Не работает',
            'key'   => 'close',
            'value' => null,
            'state' => false
        ];
        $inputs[] = [
            'name'  => 'Повышенный спрос',
            'key'   => 'demand',
            'value' => null,
            'state' => false
        ];
        $inputs[] = [
            'name'  => 'Seo текст',
            'key'   => 'seo_1',
            'value' => null,
            'state' => null
        ];
        $inputs[] = [
            'name'  => 'Seo текст',
            'key'   => 'seo_2',
            'value' => null,
            'state' => null
        ];
        $inputs[] = [
            'name'  => 'Счетчик head',
            'key'   => 'counter_1',
            'value' => null,
            'state' => null
        ];
        $inputs[] = [
            'name'  => 'Счетчик body',
            'key'   => 'counter_2',
            'value' => null,
            'state' => null
        ];
        DB::table('settings')->insert($inputs);
    }
}
