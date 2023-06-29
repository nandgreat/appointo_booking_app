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
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('booking_code');
            $table->unsignedBigInteger('trip_id')->unsigned();
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->unsignedBigInteger('booking_status_id')->unsigned();
            $table->foreign('booking_status_id')->references('id')->on('booking_statuses');
            $table->integer('sub_total')->nullable();
            $table->longText('travel_document')->nullable();
            $table->integer('no_of_passengers');
            $table->foreignId('counter_id')->nullable();
            $table->softDeletes();
            //  $table->string('status')->default('booked');
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
