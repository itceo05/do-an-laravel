<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_ticket_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_ticket_id')->unsigned();
            $table->integer('time_id')->nullable();
            $table->integer('food_id')->nullable();
            $table->text('chair')->nullable();
            $table->integer('quantity');
            $table->float('price');
            $table->foreign('book_ticket_id')->references('id')->on('book_tickets');
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
        Schema::dropIfExists('book_ticket_details');
    }
}
