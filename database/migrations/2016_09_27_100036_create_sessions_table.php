<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_time');
            $table->string('duration');
            $table->integer('num_bookings');
            $table->string('weekday');
            $table->string('mv_id');
            // artisan will have a whinge about malformed
            // foreign keys if you don't use unsigned() on int
            // based fields they're referencing 
            $table->integer('t_id')->unsigned();
        });

        Schema::table("sessions", function(Blueprint $table) {
            $table->foreign('mv_id')->references('id')->on('movies');
            $table->foreign('t_id')->references('id')->on('theatres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sessions');
    }
}
