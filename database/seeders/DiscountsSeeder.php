<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountsSeeder extends Seeder
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
            'name'    => 'Еще какая-то акция или скидка',
            'content' => 'Большая пицца «4 сыра» плюс большая пицца «Пепперони» по будням с 9.00 до 11.00 стоит всего 650 ₽. Добавь пиццы в корзину и стоимость заказа уменьшится автоматически.',
            'time'    => 'Акция действует до 31.12.2020',
            'slug'    => 'discount-1',
            'img'     => '/img/uploads/disc4.jpg'
        ];
        $inputs[] = [
            'name'    => 'Еще акция',
            'content' => 'Большая пицца «4 сыра» плюс большая пицца «Пепперони» по будням с 9.00 до 11.00 стоит всего 650 ₽. Добавь пиццы в корзину и стоимость заказа уменьшится автоматически.',
            'time'    => 'Акция действует до 31.12.2020',
            'slug'    => 'discount-154',
            'img'     => '/img/uploads/disc3.jpg'
        ];
        $inputs[] = [
            'name'    => 'Набор “Удачная ночь” за 35,30 руб.',
            'content' => 'Большая пицца «4 сыра» плюс большая пицца «Пепперони» по будням с 9.00 до 11.00 стоит всего 650 ₽. Добавь пиццы в корзину и стоимость заказа уменьшится автоматически.',
            'time'    => 'Бессрочная акция',
            'slug'    => 'discount-25',
            'img'     => '/img/uploads/disc2.jpg'
        ];
        $inputs[] = [
            'name'    => 'Скидка 20% на самовывоз',
            'content' => 'Большая пицца «4 сыра» плюс большая пицца «Пепперони» по будням с 9.00 до 11.00 стоит всего 650 ₽. Добавь пиццы в корзину и стоимость заказа уменьшится автоматически.',
            'time'    => 'Акция действует до 31.12.2021',
            'slug'    => 'discount-24',
            'img'     => '/img/uploads/disc1.jpg'
        ];
        DB::table('discounts')->insert($inputs);
    }
}
