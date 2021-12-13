<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_makers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->string('name', 100);
            $table->string('image');
            $table->string('as')->nullable();
            $table->bigInteger('film_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('film_makers');
    }
}
