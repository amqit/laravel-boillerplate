<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->unsignedInteger('group_id');
            $table->string('username',50)->unique();
            $table->string('password',150);
            $table->string('email',50);
            $table->string('fullname',100);
            $table->char('remember_token',255)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->dateTime('last_login')->nullable();
            $table->timestamps();

            $table->index('group_id');
            $table->foreign('group_id')->references('group_id')->on('tb_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_users');
    }
}
