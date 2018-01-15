<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(GroupsTableSeeder::class);
        $this->command->info('Groups table has been seeded!');

        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table has been seeded!');

        $this->call(MenusGroupSeeder::class);
        $this->command->info('Menus Group table has been seeded!');

        $this->call(MenusTableSeeder::class);
        $this->command->info('Menus table has been seeded!');

        $this->call(MenusTranslationTableSeeder::class);
        $this->command->info('Menus tranlation table has been seeded!');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
