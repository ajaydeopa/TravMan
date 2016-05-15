<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventItenariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_itenaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pack_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->string('title');
            $table->string('time');
            $table->string('notes');

            $table  ->foreign('pack_id')
                    ->references('id')->on('packages')
                    ->onDelete('cascade');

            $table  ->foreign('day_id')
                    ->references('id')->on('day_itenaries')
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
        Schema::drop('event_itenaries');
    }
}
