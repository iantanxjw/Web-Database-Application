<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sess_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('status');
        });

        Schema::table("bookings", function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sess_id')->references('id')->on('sessions');
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
