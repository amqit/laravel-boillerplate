<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_access', function (Blueprint $table) {
            $table->increments('access_id');
            $table->unsignedInteger('group_id');
            $table->char('module',150);
            $table->unsignedInteger('menu_id');
            $table->tinyInteger('is_create')->default(0);
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('is_update')->default(0);
            $table->tinyInteger('is_delete')->default(0);
            $table->tinyInteger('is_verify')->default(0);
            $table->timestamps();

            $table->index('group_id');
            $table->index('menu_id');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_access');
    }
}
