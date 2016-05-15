<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('pic');
            $table->integer('cid')->unsigned();
            $table->string('full_name');
            $table->string('company_name');
            $table->string('gender');
            $table->string('birthday');
            $table->string('martial_status');
            $table->string('phone');
            $table->string('summary', 1000);

            $table  ->foreign('cid')
                    ->references('id')->on('users')
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
        Schema::drop('userdetails');
    }
}
