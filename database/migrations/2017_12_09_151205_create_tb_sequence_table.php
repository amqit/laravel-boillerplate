<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSequenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sequence', function (Blueprint $table) {
            $table->increments('seq_id');
            $table->string('ref_name', 150)->nullable();
            $table->unsignedTinyInteger('curr_number')->default(0);
            $table->unsignedTinyInteger('curr_month')->default(0);
            $table->unsignedTinyInteger('curr_year')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sequence');
    }
}
