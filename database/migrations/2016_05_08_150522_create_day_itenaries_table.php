<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayItenariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_itenaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pack_id')->unsigned();
            $table->string('day_no');

            $table  ->foreign('pack_id')
                    ->references('id')->on('packages')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('day_itenaries');
    }
}
