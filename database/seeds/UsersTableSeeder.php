<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_users')->insert([
            [
                'user_id' => 1,
                'group_id' => 1,
                'username' => 'superadmin',
                'password' => '$2y$10$t1CRReZ0iLbygI9KC.ccguNEVVaMOYPIYZpfEmKyfdNN8Rs3LRKJy', //*k3l3mumuR
                'email' => 'superadmin@app.com',
                'fullname' => 'Super Admin',
                'active' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
