<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipments')->insert([
            'shipment_number' => 'DO-1660374725',
            'origin_id' => 1,
            'destination_id' => 2,
            'loading_date' => '2022-03-01',
            'status' => 'Created',
            'driver_id' => 10,
            'truck_id' => 10,
        ]);
    }
}
