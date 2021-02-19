<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
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
            'name'  => 'Лого',
            'key'   => 'logo',
            'value' => null,
            'img'   => '/img/common/logo.png'
        ];
        $inputs[] = [
            'name'  => 'Телефон',
            'key'   => 'phone',
            'value' => '+ 375 (29) 112-11-77',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'Минимальная сумма заказа',
            'key'   => 'min',
            'value' => '15.00 руб.',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'Время работы',
            'key'   => 'time',
            'value' => 'с 10:00 до 22:00',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'Адрес',
            'key'   => 'address',
            'value' => 'г. Минск, Ложинская, 5',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'Координаты',
            'key'   => 'coordinates',
            'value' => '53.946869, 27.688071',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'E-mail',
            'key'   => 'email',
            'value' => 'goodcarspizza@gmail.com',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'Аллатра',
            'key'   => 'allatra',
            'value' => 'https://allatraunites.com/ru',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'VK',
            'key'   => 'vk',
            'value' => '',
            'img'   => null
        ];
        $inputs[] = [
            'name'  => 'Instagram',
            'key'   => 'instagram',
            'value' => '',
            'img'   => null
        ];
        DB::table('contacts')->insert($inputs);
    }
}
