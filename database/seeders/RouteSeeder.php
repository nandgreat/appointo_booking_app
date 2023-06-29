<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = [

            ['route_name' => 'Abuja',  'created_at' => now(), 'updated_at' => now()],
            ['route_name' => 'Jos',  'created_at' => now(), 'updated_at' => now()],
            ['route_name' => 'Kaduna',  'created_at' => now(), 'updated_at' => now()],
            ['route_name' => 'Keffi',  'created_at' => now(), 'updated_at' => now()],
            ['route_name' => 'Lagos',  'created_at' => now(), 'updated_at' => now()],
            ['route_name' => 'Suleija',  'created_at' => now(), 'updated_at' => now()],

        ];

        DB::table('routes')->insert($default);
    }
}
