<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_menu')->insert([
            [
                'menu_id' => 1,
                'parent_id' => 0,
                'module' => 'admin.system.*',
                'url' => '#',
                'menu_type' => 'adminsidebar',
                'is_restrict' => 0,
                'ordering' => 0,
                'active' => 1,
                'created_at' => Carbon::now()
            ],[
                'menu_id' => 2,
                'parent_id' => 1,
                'module' => 'admin.system.menus.*',
                'url' => 'admin/system/menus',
                'menu_type' => 'adminsidebar',
                'is_restrict' => 1,
                'ordering' => 0,
                'active' => 1,
                'created_at' => Carbon::now()
            ],[
                'menu_id' => 3,
                'parent_id' => 1,
                'module' => 'admin.system.groups.*',
                'url' => 'admin/system/groups',
                'menu_type' => 'adminsidebar',
                'is_restrict' => 0,
                'ordering' => 1,
                'active' => 1,
                'created_at' => Carbon::now()
            ],[
                'menu_id' => 4,
                'parent_id' => 1,
                'module' => 'admin.system.users.*',
                'url' => 'admin/system/users',
                'menu_type' => 'adminsidebar',
                'is_restrict' => 0,
                'ordering' => 2,
                'active' => 1,
                'created_at' => Carbon::now()
            ],[
                'menu_id' => 5,
                'parent_id' => 1,
                'module' => 'admin.system.logs.*',
                'url' => 'admin/system/logs',
                'menu_type' => 'adminsidebar',
                'is_restrict' => 0,
                'ordering' => 3,
                'active' => 1,
                'created_at' => Carbon::now()
            ],[
                'menu_id' => 6,
                'parent_id' => 1,
                'module' => 'admin.system.configuration.*',
                'url' => 'admin/system/configuration',
                'menu_type' => 'adminsidebar',
                'is_restrict' => 1,
                'ordering' => 4,
                'active' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
