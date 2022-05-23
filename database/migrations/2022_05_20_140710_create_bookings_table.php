<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('total_price');
            $table->dateTime('book_date');
            $table->string('status');
            $table->unsignedBigInteger('id_user');                 
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_car');                 
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('cascade');
            $table->unsignedBigInteger('id_service');                 
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');            
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
        Schema::dropIfExists('bookings');
    }
}
