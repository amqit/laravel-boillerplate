<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_groups')->insert([
            [
                'group_id' => 1,
                'name' => 'Super Admin',
                'description' => 'Superadmin level with no limit access',
                'alias' => 'superadmin',
                'is_core' => 1,
                'created_at' => Carbon::now()
            ],[
                'group_id' => 2,
                'name' => 'Administrator',
                'description' => 'Top level administrator with all access',
                'alias' => 'admin',
                'is_core' => 1,
                'created_at' => Carbon::now()
            ],[
                'group_id' => 3,
                'name' => 'Users',
                'description' => 'Users level with limited access',
                'alias' => 'users',
                'is_core' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
