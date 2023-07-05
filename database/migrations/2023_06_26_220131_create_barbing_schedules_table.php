<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barbing_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references('id')->on('users');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('cancel_url');
            $table->string('reschedule_url');
            $table->string('event_url');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('service_type');
            $table->string('address');
            $table->unsignedBigInteger("barbing_status_id");
            $table->foreign("barbing_status_id")->references('id')->on('barbing_statuses');
            $table->float('booking_amount');
            $table->dateTime('booking_date');

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
        Schema::dropIfExists('barbing_schedules');
    }
}
