<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');//customer who booked package.
            $table->string('company_id');//agent's id whose customer has booked package
            $table->string('package_id');
            $table->string('package_duration');
            $table->date('departure_date');
            $table->string('name');
            $table->string('email');
            $table->integer('no_of_adults');
            $table->integer('no_of_childrens');
            $table->string('payment_id');
            $table->string('phone_no');
            $table->timestamp('booked_at');
            
            /*$table->foreign('cid')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
