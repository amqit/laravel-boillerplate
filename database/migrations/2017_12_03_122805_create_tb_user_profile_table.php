<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('display_name',50)->nullable();;
            $table->string('handphone',50)->nullable();
            $table->string('telephone',50)->nullable();
            $table->string('company',200)->nullable();
            $table->mediumText('address')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('user_id')->on('tb_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_user_profile');
    }
}
