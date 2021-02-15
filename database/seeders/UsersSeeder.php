<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriesSeeder extends Seeder
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
            'name'     => 'moonway',
            'email'    => 'e.maksakava@moonway.by',
            'password' => '$2y$10$RbXcTbDcQ3eVYSeUuZKhS.GANEEnN7F4QMw80bgsRPKUmoTwGjV5.',
        ];
        DB::table('users')->insert($inputs);
    }
}
