<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_details', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('time_id')->unsigned();
            $table->bigInteger('film_id')->unsigned();
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('cinema_id')->unsigned();
            $table->timestamps();
            $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->foreign('time_id')->references('id')->on('times');
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('room_id')->references('id')->on('movie_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_details');
    }
}
