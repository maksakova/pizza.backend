<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('menu_ingredients')->delete();

        \DB::table('menu_ingredients')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Ветчина',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-1.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Говядина',
                    'menu_category_id' => '1,3',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Бекон',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-3.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Курица',
                    'menu_category_id' => '1,3',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-4.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Свинина',
                    'menu_category_id' => '3',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-4.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Пепперони',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-5.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Салями',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-6.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Сосиски',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-7.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => 'Охотничьи колбаски',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 1,
                    'img' => '/img/uploads/meat-8.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Лосось',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 2,
                    'img' => '/img/uploads/seafood-1.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'Креветки',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 2,
                    'img' => '/img/uploads/seafood-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Морской коктейль',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 2,
                    'img' => '/img/uploads/seafood-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Моцарелла',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 3,
                    'img' => '/img/uploads/cheese-1.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Дор Блю',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 3,
                    'img' => '/img/uploads/cheese-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Пармезан',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 3,
                    'img' => '/img/uploads/cheese-3.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Чеддер',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 3,
                    'img' => '/img/uploads/cheese-4.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Сырные шарики моцареллы',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 3,
                    'img' => '/img/uploads/cheese-5.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Сырный борт',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 3,
                    'img' => '/img/uploads/cheese-6.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Помидоры',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-1.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Огурцы маринованные',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Шампиньоны',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-3.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Лук маринованный',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-4.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => 'Маслины',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-5.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'Перец болгарский',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-6.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            24 =>
                array (
                    'id' => 25,
                    'name' => 'Перец Чили',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-7.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'Перец Халапеньо',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-8.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            26 =>
                array (
                    'id' => 27,
                    'name' => 'Опята маринованные',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-9.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'Маслята маринованные',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-10.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'Шпинат',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-11.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'Брокколи',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 4,
                    'img' => '/img/uploads/vegetables-12.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            30 =>
                array (
                    'id' => 31,
                    'name' => 'Чесночный ранч',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-1.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => 'Барбекю',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => 'Горчичный',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-3.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            33 =>
                array (
                    'id' => 34,
                    'name' => 'Тар-Тар',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-4.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            34 =>
                array (
                    'id' => 35,
                    'name' => 'Сырный',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-5.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            35 =>
                array (
                    'id' => 36,
                    'name' => 'Гриль',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-6.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            36 =>
                array (
                    'id' => 37,
                    'name' => '1000 островов',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-7.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            37 =>
                array (
                    'id' => 38,
                    'name' => 'Сальса',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-8.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            38 =>
                array (
                    'id' => 39,
                    'name' => 'Цезарь',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-9.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            39 =>
                array (
                    'id' => 40,
                    'name' => 'Грибной',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-10.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            40 =>
                array (
                    'id' => 41,
                    'name' => 'Терияки',
                    'menu_category_id' => '1',
                    'menu_ingredient_group_id' => 5,
                    'img' => '/img/uploads/souce-11.jpg',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
        ));


    }
}
