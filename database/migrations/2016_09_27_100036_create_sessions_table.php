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
            $table->increments('session_id');
            $table->string('start_time');
            $table->string('duration');
            $table->integer('num_bookings');
            $table->string('mv_id');
            $table->string('t_id');
            $table->foreign('mv_id')->references('id')->on('movies');
            $table->foreign('t_id')->references('t_id')->on('theatre');
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