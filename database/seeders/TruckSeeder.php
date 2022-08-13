<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trucks')->insert([
            'id' => 10,
            'license_number' => 'J 3232 D0',
            'license_type' => 'Yellow',
            'truck_type' => 'Blindvan',
            'production_year' => 2003,
            'is_active' => 1
        ]);
    }
}
