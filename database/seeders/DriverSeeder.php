<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
            'id' => 10,
            'name' => 'Driver 1',
            'phone_number' => '029302024',
            'id_card_file_name' => 'drivers/U862p4DCmQcpnXGHKP68IDFsLBvwsleXNRJ3RhDh.jpg',
            'driver_license_file_name' => 'drivers/PiV7BL0qPG9iXNkhpXK8KfiVqMgtO1pJEzWGEogs.jpg',
            'is_active' => 1,
        ]);
    }
}
