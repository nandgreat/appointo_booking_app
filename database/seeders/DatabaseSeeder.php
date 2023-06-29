<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(class:AdminTableSeeder::class);
        $this->call(class:BusSeeder::class);
        $this->call(class:SeatSeeder::class);
        $this->call(class:RouteSeeder::class);
        $this->call(class:TripSeeder::class);
        $this->call(class:BookingStatusSeeder::class);

    }
}
