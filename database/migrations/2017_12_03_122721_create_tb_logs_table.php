<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_logs', function (Blueprint $table) {
            $table->increments('log_id');
            $table->string('module',200);
            $table->string('task',150);
            $table->unsignedInteger('user_id');
            $table->string('ipaddress',50);
            $table->string('useragent',200);
            $table->mediumText('note');
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_logs');
    }
}
