<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [
            [
                'bus_id' => 1,
                'from' => 'Abuja',
                'to' => 'Lagos',
                'departure_date' => '2022-05-25',
                'departure_time' => '9:00am',
                'price' => '15000',
                'seats_available' => '18',
                'seats_taken' => '0',
                'created_at' => now()
            ],
            [
                'bus_id' => 2,
                'from' => 'Abuja',
                'to' => 'Jos',
                'departure_date' => '2022-05-25',
                'departure_time' => '9:00am',
                'price' => '8500',
                'seats_available' => '18',
                'seats_taken' => '0',
                'created_at' => now()
            ]
        ];

        DB::table('trips')->insert($default);
    }
}
