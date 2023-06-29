<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [
            ['booking_status' => 'Pending', 'created_at' => Carbon::now()],
            ['booking_status' => 'Confirmed', 'created_at' => Carbon::now()],
            ['booking_status' => 'Payment Completed', 'created_at' => Carbon::now()],
            ['booking_status' => 'Trip Completed', 'created_at' => Carbon::now()],
            ['booking_status' => 'Cancelled', 'created_at' => Carbon::now()]
        ];

        DB::table('booking_statuses')->insert($default);
    }
}
