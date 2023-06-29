<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [
            ['bus_name' => 'Big Willis', 'bus_type' => 'Public Bus', 'seat_capacity' => 18, 'coach_number' => 'BW-002', 'created_at' => now(), 'updated_at' => now()],
            ['bus_name' => 'Miranda Lane', 'bus_type' => 'Public Bus', 'seat_capacity' => 18, 'coach_number' => 'BW-003', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('buses')->insert($default);
    }
}
