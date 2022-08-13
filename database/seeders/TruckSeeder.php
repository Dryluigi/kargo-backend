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
        DB::table('trucks')->insert([
            'id' => 11,
            'license_number' => 'L 23323 dd',
            'license_type' => 'Black',
            'truck_type' => 'Truck',
            'production_year' => 2018,
            'is_active' => 1
        ]);
        DB::table('trucks')->insert([
            'id' => 12,
            'license_number' => 'DK ewww 32',
            'license_type' => 'Black',
            'truck_type' => 'Truck',
            'production_year' => 2016,
            'is_active' => 1
        ]);
        DB::table('trucks')->insert([
            'id' => 13,
            'license_number' => 'L 2323 87',
            'license_type' => 'Black',
            'truck_type' => 'Truck',
            'production_year' => 2013,
            'is_active' => 1
        ]);
    }
}
