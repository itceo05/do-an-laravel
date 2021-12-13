<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_details', function (Blueprint $table) {
            $table->bigInteger('cinema_id')->unsigned();
            $table->bigInteger('film_id')->unsigned();
            $table->timestamps();
            $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->foreign('film_id')->references('id')->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_details');
    }
}
