<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMenuTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id')->default(0);
            $table->string('menu_title',100)->nullable();
            $table->string('meta_title',100)->nullable();
            $table->string('meta_description',100)->nullable();
            $table->enum('locale', ['en','id','nl'])->default('en');
            $table->timestamps();

            $table->index('menu_id');
            $table->foreign('menu_id')->references('menu_id')->on('tb_menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_menu_translation');
    }
}
