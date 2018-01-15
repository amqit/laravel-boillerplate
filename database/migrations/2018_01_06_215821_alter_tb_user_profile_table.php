<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTbUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_user_profile', function (Blueprint $table) {
            $table->date('birthdate')->nullable()->after('display_name');
            $table->string('birthplace',50)->nullable()->after('birthdate');
            $table->unsignedTinyInteger('age')->nullable()->default(0)->after('birthplace');
            $table->enum('gender',['male','female'])->nullable()->after('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_user_profile', function($table) {
            $table->dropColumn('birthdate');
            $table->dropColumn('birthplace');
            $table->dropColumn('age');
            $table->dropColumn('gender');
        });
    }
}
