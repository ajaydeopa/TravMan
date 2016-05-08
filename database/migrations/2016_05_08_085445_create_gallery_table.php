<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('thumb');
            $table->string('pic');});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

           Schema::drop('galleries');

    }
}
