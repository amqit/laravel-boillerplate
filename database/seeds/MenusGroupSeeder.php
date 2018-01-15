<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenusGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_menu_group')->insert([
            [
                'id' => 1,
                'menu_group' => 'Admin Sidebar',
                'menu_group_alias' => 'adminsidebar',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
