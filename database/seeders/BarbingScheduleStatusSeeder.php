<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarbingScheduleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [
            ['barbing_status' => 'Booked', 'created_at' => Carbon::now()],
            ['barbing_status' => 'Paid', 'created_at' => Carbon::now()],
            ['barbing_status' => 'Completed', 'created_at' => Carbon::now()],
            ['barbing_status' => 'Cancelled', 'created_at' => Carbon::now()],
        ];

        DB::table('barbing_statuses')->insert($default);

    }
}
