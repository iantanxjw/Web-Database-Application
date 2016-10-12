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
            // artisan will have a whinge about malformed
            // foreign keys if you don't use unsigned() on int
            // based fields they're referencing
            $table->integer('user_id')->unsigned();
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
