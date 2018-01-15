<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MenusTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_menu_translation')->insert([
            [
                'id' => 1,
                'menu_id' => 1,
                'menu_title' => 'System Settings',
                'meta_title' => 'System Settings',
                'meta_description' => 'System Settings',
                'locale' => 'en',
                'created_at' => Carbon::now()
            ],[
                'id' => 2,
                'menu_id' => 2,
                'menu_title' => 'Menu Management',
                'meta_title' => 'Menu management',
                'meta_description' => 'Menu management',
                'locale' => 'en',
                'created_at' => Carbon::now()
            ],[
                'id' => 3,
                'menu_id' => 3,
                'menu_title' => 'Groups Management',
                'meta_title' => 'Groups management',
                'meta_description' => 'Groups management',
                'locale' => 'en',
                'created_at' => Carbon::now()
            ],[
                'id' => 4,
                'menu_id' => 4,
                'menu_title' => 'Users Management',
                'meta_title' => 'Users management',
                'meta_description' => 'Users management',
                'locale' => 'en',
                'created_at' => Carbon::now()
            ],[
                'id' => 5,
                'menu_id' => 5,
                'menu_title' => 'Activity Log',
                'meta_title' => 'Activity Log',
                'meta_description' => 'Users activity log',
                'locale' => 'en',
                'created_at' => Carbon::now()
            ],[
                'id' => 6,
                'menu_id' => 6,
                'menu_title' => 'App Configuration',
                'meta_title' => 'App Configuration',
                'meta_description' => 'Application configuration',
                'locale' => 'en',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
