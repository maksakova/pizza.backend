<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('menu_products')->delete();

        \DB::table('menu_products')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Капричезе',
                    'menu_category_id' => 1,
                    'menu_filter_id' => 1,
                    'composition' => 'сыр Моцарелла, Пармезан, Шампиньоны, соус Грибной',
                    'weight' => NULL,
                    'min_price' => 9.9,
                    'variants_show' => 0,
                    'img' => '/img/uploads/pizza-3.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-04 12:31:34',
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Маргарита',
                    'menu_category_id' => 1,
                    'menu_filter_id' => 1,
                    'composition' => 'Сыр Моцарелла, Томаты, Пицца-соус, Базилик свежий',
                    'weight' => NULL,
                    'min_price' => 9.9,
                    'variants_show' => 0,
                    'img' => '/img/uploads/pizza-1.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 09:29:28',
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Цыпленок Песто',
                    'menu_category_id' => 1,
                    'menu_filter_id' => NULL,
                    'composition' => 'Ветчина, Бекон, Филе куриное, Сыр Моцарелла, Шампиньоны, соус Чесночный ранч, соус Песто',
                    'weight' => '',
                    'min_price' => 14.5,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_tsyplenok-pesto-2.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 14:38:21',
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Филадельфия маки',
                    'menu_category_id' => 2,
                    'menu_filter_id' => NULL,
                    'composition' => 'Рис, сыр сливочный, лосось. 260 гр (8 шт.)',
                    'weight' => NULL,
                    'min_price' => 14.0,
                    'variants_show' => 1,
                    'img' => '/img/uploads/filadelfiya-maki.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 09:33:10',
                    'deleted_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Лапша с курицей в соусе терияки',
                    'menu_category_id' => 3,
                    'menu_filter_id' => NULL,
                    'composition' => 'Филе куриное, Перец болгарский, Перец Чили, соус Терияки, Цукини, Морковь, Лук репчатый, Чеснок, Лук зеленый, Кунжут, Перец черный свежемолотый',
                    'weight' => NULL,
                    'min_price' => 10.0,
                    'variants_show' => 0,
                    'img' => '/img/uploads/kuritsa_r1.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 13:06:55',
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Драники картофельные',
                    'menu_category_id' => 4,
                    'menu_filter_id' => NULL,
                    'composition' => 'Драники из картофеля со сметаной, 200 гр',
                    'weight' => NULL,
                    'min_price' => 4.2,
                    'variants_show' => 1,
                    'img' => '/img/uploads/draniki-kartofelnye.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 11:39:28',
                    'deleted_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Хачапури по-аджарски',
                    'menu_category_id' => 5,
                    'menu_filter_id' => NULL,
                    'composition' => 'Сыр Адыгейский, сыр Сулугуни, сливки, желток, масло сливочное',
                    'weight' => NULL,
                    'min_price' => 7.9,
                    'variants_show' => 1,
                    'img' => '/img/uploads/khachapuri.jpg',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 14:46:30',
                    'deleted_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Бонито с угрем и креветкой',
                    'menu_category_id' => 2,
                    'menu_filter_id' => NULL,
                    'composition' => 'Рис, сыр сливочный, угорь, креветки тигровые, яичный блинчик, стружка тунца, соус спайси. 240 гр (8 шт.)',
                    'weight' => NULL,
                    'min_price' => 14.0,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_bonito-s-ugrem-i-krevetkoy-=12,5-(220-gr).jpg',
                    'created_at' => '2021-03-04 12:39:51',
                    'updated_at' => '2021-03-09 09:35:07',
                    'deleted_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => 'Лапша с мидиями в сливочном соусе',
                    'menu_category_id' => 3,
                    'menu_filter_id' => NULL,
                    'composition' => 'Перец Чили, Шпинат, Морковь, Лук репчатый, Чеснок, Кунжут, Перец черный свежемолотый, Мидии, Сыр сливочный, Соевый соус',
                    'weight' => NULL,
                    'min_price' => 12.0,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_midii_r1.jpg',
                    'created_at' => '2021-03-04 12:42:10',
                    'updated_at' => '2021-03-09 11:24:01',
                    'deleted_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Омлет из печи',
                    'menu_category_id' => 4,
                    'menu_filter_id' => NULL,
                    'composition' => 'Омлет из двух яиц на молоке, 250 гр',
                    'weight' => NULL,
                    'min_price' => 3.5,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_1-omlet-iz-pechi.jpg',
                    'created_at' => '2021-03-04 12:43:30',
                    'updated_at' => '2021-03-09 11:40:04',
                    'deleted_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'Хачапури по-мегрельски',
                    'menu_category_id' => 5,
                    'menu_filter_id' => NULL,
                    'composition' => 'Сыр Адыгейский, сыр Сулугуни, сливки, яйцо, масло сливочное',
                    'weight' => NULL,
                    'min_price' => 11.5,
                    'variants_show' => 1,
                    'img' => '/img/uploads/hachapuri-po-megrelski.jpg',
                    'created_at' => '2021-03-04 12:44:57',
                    'updated_at' => '2021-03-10 07:02:03',
                    'deleted_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Пирожок с картошкой и грибами',
                    'menu_category_id' => 6,
                    'menu_filter_id' => NULL,
                    'composition' => 'Тесто сдобное, картофель, шампиньоны, лук репчатый, чеснок, специи, зелень, 150 гр (1 шт.)',
                    'weight' => NULL,
                    'min_price' => 2.2,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_pirojok-s-kartoshkoy-i-gribami.jpg',
                    'created_at' => '2021-03-04 12:47:28',
                    'updated_at' => '2021-03-09 14:47:33',
                    'deleted_at' => NULL,
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Пирожок с капустой и грибами',
                    'menu_category_id' => 6,
                    'menu_filter_id' => NULL,
                    'composition' => 'Тесто сдобное, капуста, морковь, шампиньоны, лук репчатый, чеснок, специи, зелень, 150 гр (1 шт.)',
                    'weight' => NULL,
                    'min_price' => 2.2,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_pirojok-s-kapustoy-i-gribami.jpg',
                    'created_at' => '2021-03-04 12:48:16',
                    'updated_at' => '2021-03-09 11:55:05',
                    'deleted_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Пирожок с сыром и пепперони',
                    'menu_category_id' => 6,
                    'menu_filter_id' => NULL,
                    'composition' => 'Тесто сдобное, сыр сулугуни, колбаса пепперони, 145 гр (1 шт.)',
                    'weight' => NULL,
                    'min_price' => 3.5,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_pirojok-jarennyy-s-syrom-i-pepperoni.jpg',
                    'created_at' => '2021-03-04 12:49:29',
                    'updated_at' => '2021-03-09 11:56:00',
                    'deleted_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Лапша с тунцом в соусе унаги',
                    'menu_category_id' => 3,
                    'menu_filter_id' => NULL,
                    'composition' => 'Перец болгарский, Перец Чили, Цукини, Морковь, Лук репчатый, Чеснок, Лук зеленый, Кунжут, Перец черный свежемолотый, Тунец, Стручковая фасоль, Соус унаги',
                    'weight' => NULL,
                    'min_price' => 13.5,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_tunets_r1.jpg',
                    'created_at' => '2021-03-04 12:54:24',
                    'updated_at' => '2021-03-10 09:24:16',
                    'deleted_at' => NULL,
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Каша овсяная из печи',
                    'menu_category_id' => 4,
                    'menu_filter_id' => NULL,
                    'composition' => 'Каша овсяная на молоке с маслом сливочным, 300 гр',
                    'weight' => NULL,
                    'min_price' => 3.5,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_kasha.jpg',
                    'created_at' => '2021-03-04 12:55:46',
                    'updated_at' => '2021-03-09 11:40:33',
                    'deleted_at' => NULL,
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Хачапури по-аджарски с сырным бортом',
                    'menu_category_id' => 5,
                    'menu_filter_id' => NULL,
                    'composition' => 'Сыр Адыгейский, сыр Сулугуни, сыр Сливочный (сырный борт), сливки, желток, масло сливочное',
                    'weight' => NULL,
                    'min_price' => 12.0,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_hachapuri-po---adjarski-s-syrnym-bortom-2.jpg',
                    'created_at' => '2021-03-04 12:57:25',
                    'updated_at' => '2021-03-09 14:46:41',
                    'deleted_at' => NULL,
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Сладкий ролл с апельсином и киви',
                    'menu_category_id' => 7,
                    'menu_filter_id' => NULL,
                    'composition' => 'Ванильный блинчик, сливочный сыр, апельсин, киви, 180 гр (6 шт.)',
                    'weight' => NULL,
                    'min_price' => 7.5,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_sladkiy-roll-s-kivi-2.jpg',
                    'created_at' => '2021-03-04 12:59:40',
                    'updated_at' => '2021-03-09 11:56:58',
                    'deleted_at' => NULL,
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Тирамису',
                    'menu_category_id' => 7,
                    'menu_filter_id' => NULL,
                    'composition' => 'Знаменитый итальянский десерт с сыром маскарпоне и палочками савоярди, 135 гр',
                    'weight' => NULL,
                    'min_price' => 5.5,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_5-tiramisu.jpg',
                    'created_at' => '2021-03-04 13:00:15',
                    'updated_at' => '2021-03-09 11:57:34',
                    'deleted_at' => NULL,
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Торт Медовик',
                    'menu_category_id' => 7,
                    'menu_filter_id' => NULL,
                    'composition' => 'Классический Медовик со сметанным кремом, 185 гр',
                    'weight' => NULL,
                    'min_price' => 6.5,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_7-pirojnoe-smetannik.jpg',
                    'created_at' => '2021-03-04 13:01:02',
                    'updated_at' => '2021-03-09 11:57:53',
                    'deleted_at' => NULL,
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Вода питьевая Bonaqua сильногазированная',
                    'menu_category_id' => 8,
                    'menu_filter_id' => NULL,
                    'composition' => 'Питьевая, чистая, сильногазированная, артезианская, очищенная, кондиционированная.',
                    'weight' => NULL,
                    'min_price' => 1.2,
                    'variants_show' => 1,
                    'img' => '/img/uploads/70_32-BONAQUA-silnogaz..png',
                    'created_at' => '2021-03-04 13:02:25',
                    'updated_at' => '2021-03-09 12:54:16',
                    'deleted_at' => NULL,
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Напиток Fanta апельсин',
                    'menu_category_id' => 8,
                    'menu_filter_id' => NULL,
                    'composition' => 'Безалкогольный газированный витаминизированный. С апельсиновым соком.',
                    'weight' => NULL,
                    'min_price' => 1.9,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_27-FANTA-apelsin.png',
                    'created_at' => '2021-03-04 13:03:06',
                    'updated_at' => '2021-03-09 12:52:54',
                    'deleted_at' => NULL,
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => 'Вода питьевая Bonaqua среднегазированная',
                    'menu_category_id' => 8,
                    'menu_filter_id' => NULL,
                    'composition' => 'Вода артезианская, очищенная, кондиционированная, первой категории.',
                    'weight' => NULL,
                    'min_price' => 1.2,
                    'variants_show' => 0,
                    'img' => '/img/uploads/70_25-BONAQUA-srednegaz..png',
                    'created_at' => '2021-03-04 13:03:55',
                    'updated_at' => '2021-03-09 12:54:46',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
