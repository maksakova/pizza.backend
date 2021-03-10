<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('menu_product_variants')->delete();

        \DB::table('menu_product_variants')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Традиционное',
                    'menu_product_id' => 1,
                    'menu_variant_id' => 1,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Тонкое',
                    'menu_product_id' => 1,
                    'menu_variant_id' => 1,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => '25 см',
                    'menu_product_id' => 1,
                    'menu_variant_id' => 2,
                    'price' => 9.9,
                    'weight' => '360,420',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-04 12:22:36',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => '30 см',
                    'menu_product_id' => 1,
                    'menu_variant_id' => 2,
                    'price' => 13.9,
                    'weight' => '400,520',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-04 12:22:49',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => '35 см',
                    'menu_product_id' => 1,
                    'menu_variant_id' => 2,
                    'price' => 17.9,
                    'weight' => '560,620',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-04 12:23:02',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Традиционное',
                    'menu_product_id' => 3,
                    'menu_variant_id' => 1,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Тонкое',
                    'menu_product_id' => 3,
                    'menu_variant_id' => 1,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => '25 см',
                    'menu_product_id' => 3,
                    'menu_variant_id' => 2,
                    'price' => 14.5,
                    'weight' => '360,420',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => '30 см',
                    'menu_product_id' => 3,
                    'menu_variant_id' => 2,
                    'price' => 17.9,
                    'weight' => '400,520',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => '35 см',
                    'menu_product_id' => 3,
                    'menu_variant_id' => 2,
                    'price' => 23.5,
                    'weight' => '560,620',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => '250 гр',
                    'menu_product_id' => 7,
                    'menu_variant_id' => 3,
                    'price' => 7.9,
                    'weight' => '250',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 11:41:32',
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => '350 гр',
                    'menu_product_id' => 7,
                    'menu_variant_id' => 3,
                    'price' => 10.5,
                    'weight' => '350',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 11:41:51',
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => '530 гр',
                    'menu_product_id' => 7,
                    'menu_variant_id' => 3,
                    'price' => 15.5,
                    'weight' => '530',
                    'created_at' => NULL,
                    'updated_at' => '2021-03-09 11:42:04',
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => '300 гр',
                    'menu_product_id' => 5,
                    'menu_variant_id' => 3,
                    'price' => 10.0,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 09:36:11',
                    'updated_at' => '2021-03-09 09:36:11',
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => '450 гр',
                    'menu_product_id' => 5,
                    'menu_variant_id' => 3,
                    'price' => 12.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 09:36:29',
                    'updated_at' => '2021-03-09 09:36:29',
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Удон',
                    'menu_product_id' => 5,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 10:54:24',
                    'updated_at' => '2021-03-09 10:54:24',
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Яичная',
                    'menu_product_id' => 5,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:09:22',
                    'updated_at' => '2021-03-09 11:09:22',
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Рисовая',
                    'menu_product_id' => 5,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:09:33',
                    'updated_at' => '2021-03-09 11:09:33',
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Гречневая',
                    'menu_product_id' => 5,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:09:45',
                    'updated_at' => '2021-03-09 11:09:45',
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => '300 гр',
                    'menu_product_id' => 9,
                    'menu_variant_id' => 3,
                    'price' => 12.0,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:19:50',
                    'updated_at' => '2021-03-10 09:24:04',
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => '450 гр',
                    'menu_product_id' => 9,
                    'menu_variant_id' => 3,
                    'price' => 15.9,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:20:02',
                    'updated_at' => '2021-03-10 09:24:12',
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => '300 гр',
                    'menu_product_id' => 15,
                    'menu_variant_id' => 3,
                    'price' => 13.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:25:46',
                    'updated_at' => '2021-03-09 11:25:46',
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => '450 гр',
                    'menu_product_id' => 15,
                    'menu_variant_id' => 3,
                    'price' => 18.0,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:26:02',
                    'updated_at' => '2021-03-09 11:26:02',
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'Удон',
                    'menu_product_id' => 15,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:26:25',
                    'updated_at' => '2021-03-09 11:26:25',
                ),
            24 =>
                array (
                    'id' => 25,
                    'name' => 'Яичная',
                    'menu_product_id' => 15,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:27:15',
                    'updated_at' => '2021-03-09 11:27:15',
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'Рисовая',
                    'menu_product_id' => 15,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:27:30',
                    'updated_at' => '2021-03-09 11:27:30',
                ),
            26 =>
                array (
                    'id' => 27,
                    'name' => 'Гречневая',
                    'menu_product_id' => 15,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:27:41',
                    'updated_at' => '2021-03-09 11:27:41',
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'Удон',
                    'menu_product_id' => 9,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:35:16',
                    'updated_at' => '2021-03-09 11:35:16',
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'Яичная',
                    'menu_product_id' => 9,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:35:38',
                    'updated_at' => '2021-03-09 11:35:38',
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'Рисовая',
                    'menu_product_id' => 9,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:35:56',
                    'updated_at' => '2021-03-09 11:35:56',
                ),
            30 =>
                array (
                    'id' => 31,
                    'name' => 'Гречневая',
                    'menu_product_id' => 9,
                    'menu_variant_id' => 5,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:36:08',
                    'updated_at' => '2021-03-09 11:36:08',
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => '370 гр',
                    'menu_product_id' => 11,
                    'menu_variant_id' => 3,
                    'price' => 11.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:44:03',
                    'updated_at' => '2021-03-09 11:44:03',
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => '450 гр',
                    'menu_product_id' => 11,
                    'menu_variant_id' => 3,
                    'price' => 13.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:44:23',
                    'updated_at' => '2021-03-09 11:44:23',
                ),
            33 =>
                array (
                    'id' => 34,
                    'name' => '360 гр',
                    'menu_product_id' => 17,
                    'menu_variant_id' => 3,
                    'price' => 12.0,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:48:05',
                    'updated_at' => '2021-03-09 11:48:05',
                ),
            34 =>
                array (
                    'id' => 35,
                    'name' => '550 гр',
                    'menu_product_id' => 17,
                    'menu_variant_id' => 3,
                    'price' => 18.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:48:28',
                    'updated_at' => '2021-03-09 11:48:28',
                ),
            35 =>
                array (
                    'id' => 36,
                    'name' => 'Жареный',
                    'menu_product_id' => 12,
                    'menu_variant_id' => 4,
                    'price' => 2.2,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:49:30',
                    'updated_at' => '2021-03-10 06:58:35',
                ),
            36 =>
                array (
                    'id' => 37,
                    'name' => 'Из печи',
                    'menu_product_id' => 12,
                    'menu_variant_id' => 4,
                    'price' => 2.2,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:49:46',
                    'updated_at' => '2021-03-10 06:58:46',
                ),
            37 =>
                array (
                    'id' => 38,
                    'name' => 'Жареный',
                    'menu_product_id' => 13,
                    'menu_variant_id' => 4,
                    'price' => 2.2,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:54:35',
                    'updated_at' => '2021-03-10 06:59:01',
                ),
            38 =>
                array (
                    'id' => 39,
                    'name' => 'Из печи',
                    'menu_product_id' => 13,
                    'menu_variant_id' => 4,
                    'price' => 2.2,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:54:45',
                    'updated_at' => '2021-03-10 06:59:19',
                ),
            39 =>
                array (
                    'id' => 40,
                    'name' => 'Жареный',
                    'menu_product_id' => 14,
                    'menu_variant_id' => 4,
                    'price' => 3.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:55:42',
                    'updated_at' => '2021-03-10 06:59:41',
                ),
            40 =>
                array (
                    'id' => 41,
                    'name' => 'Из печи',
                    'menu_product_id' => 14,
                    'menu_variant_id' => 4,
                    'price' => 3.5,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 11:55:51',
                    'updated_at' => '2021-03-10 06:59:48',
                ),
            41 =>
                array (
                    'id' => 42,
                    'name' => 'Традиционное',
                    'menu_product_id' => 2,
                    'menu_variant_id' => 1,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 14:27:29',
                    'updated_at' => '2021-03-09 14:27:29',
                ),
            42 =>
                array (
                    'id' => 43,
                    'name' => 'Тонкое',
                    'menu_product_id' => 2,
                    'menu_variant_id' => 1,
                    'price' => NULL,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 14:27:38',
                    'updated_at' => '2021-03-09 14:27:38',
                ),
            43 =>
                array (
                    'id' => 44,
                    'name' => '25 см',
                    'menu_product_id' => 2,
                    'menu_variant_id' => 2,
                    'price' => 9.9,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 14:28:05',
                    'updated_at' => '2021-03-09 14:28:05',
                ),
            44 =>
                array (
                    'id' => 45,
                    'name' => '30 см',
                    'menu_product_id' => 2,
                    'menu_variant_id' => 2,
                    'price' => 13.9,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 14:28:21',
                    'updated_at' => '2021-03-09 14:28:21',
                ),
            45 =>
                array (
                    'id' => 46,
                    'name' => '35 см',
                    'menu_product_id' => 2,
                    'menu_variant_id' => 2,
                    'price' => 17.9,
                    'weight' => NULL,
                    'created_at' => '2021-03-09 14:28:41',
                    'updated_at' => '2021-03-09 14:28:41',
                ),
        ));


    }
}
