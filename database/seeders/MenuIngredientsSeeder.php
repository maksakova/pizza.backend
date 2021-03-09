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
        $inputs = [];
        $inputs[] = [
            'name'                     => 'Ветчина',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-1.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Говядина',
            'menu_category_id'         => '1,3',
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-2.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Бекон',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-3.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Курица',
            'menu_category_id'         => '1,3',
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-4.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Свинина',
            'menu_category_id'         => '3',
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-4.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Пепперони',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-5.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Салями',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-6.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Сосиски',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-7.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Охотничьи колбаски',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 1,
            'img'                      => '/img/uploads/meat-8.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Лосось',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 2,
            'img'                      => '/img/uploads/seafood-1.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Креветки',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 2,
            'img'                      => '/img/uploads/seafood-2.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Морской коктейль',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 2,
            'img'                      => '/img/uploads/seafood-2.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Моцарелла',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 3,
            'img'                      => '/img/uploads/cheese-1.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Дор Блю',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 3,
            'img'                      => '/img/uploads/cheese-2.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Пармезан',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 3,
            'img'                      => '/img/uploads/cheese-3.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Чеддер',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 3,
            'img'                      => '/img/uploads/cheese-4.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Сырные шарики моцареллы',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 3,
            'img'                      => '/img/uploads/cheese-5.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Сырный борт',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 3,
            'img'                      => '/img/uploads/cheese-6.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Помидоры',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-1.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Огурцы маринованные',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-2.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Шампиньоны',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-3.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Лук маринованный',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-4.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Маслины',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-5.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Перец болгарский',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-6.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Перец Чили',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-7.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Перец Халапеньо',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-8.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Опята маринованные',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-9.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Маслята маринованные',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-10.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Шпинат',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-11.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Брокколи',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 4,
            'img'                      => '/img/uploads/vegetables-12.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Чесночный ранч',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-1.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Барбекю',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-2.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Горчичный',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-3.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Тар-Тар',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-4.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Сырный',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-5.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Гриль',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-6.jpg',
        ];
        $inputs[] = [
            'name'                     => '1000 островов',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-7.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Сальса',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-8.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Цезарь',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-9.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Грибной',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-10.jpg',
        ];
        $inputs[] = [
            'name'                     => 'Терияки',
            'menu_category_id'         => 1,
            'menu_ingredient_group_id' => 5,
            'img'                      => '/img/uploads/souce-11.jpg',
        ];
        DB::table('menu_ingredients')->insert($inputs);
    }
}
