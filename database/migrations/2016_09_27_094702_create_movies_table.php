<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('mv_id');
            $table->string('title');
            $table->text('desc');
            $table->string('release_date');
            $table->string('genre')->nullable();

            // movie might not have a poster or bg available
            $table->string('poster')->nullable();
            $table->string('bg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies');
    }
}
