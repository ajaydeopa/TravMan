<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->integer('cid');
            $table->string('email');
            $table->string('feedback');
            $table->timestamp('at');
=======
            $table->integer('cid')->unsigned();
            $table->string('email');
            $table->string('feedback');
            $table->timestamp('at');

            $table  ->foreign('cid')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
>>>>>>> origin/itenary
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feedbacks');
    }
}
