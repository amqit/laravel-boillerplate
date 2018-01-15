<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('module',100)->nullable();
            $table->string('url',100)->nullable();
            $table->string('menu_type',50)->default('adminsidebar');
            $table->tinyInteger('is_restrict')->default(0);
            $table->tinyInteger('ordering')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->string('menu_icons',30)->nullable();
            $table->timestamps();

            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_menu');
    }
}
