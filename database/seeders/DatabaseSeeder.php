<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(MenuCategoriesSeeder::class);
        $this->call(MenuFiltersSeeder::class);
        $this->call(MenuIngredientsSeeder::class);
        $this->call(MenuIngredientGroupsSeeder::class);
        $this->call(MenuVariantsSeeder::class);
        $this->call(MainBannersSeeder::class);
        $this->call(DiscountsSeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(DeliveryMethodsSeeder::class);
        $this->call(PaymentMethodsSeeder::class);
        $this->call(OrderStatusesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(MenuProductsSeeder::class);
        $this->call(MenuProductVariantsSeeder::class);
        $this->call(MenuVariantsSeeder::class);
    }
}
