<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'id' => 16,
            'name' => 'Budi',
            'phone_number' => '0293020253',
            'id_card_file_name' => 'drivers/ZMI4VsghGtNelgqysKbw5WvScqQutpM1dYD29FFb.jpg',
            'driver_license_file_name' => 'drivers/PQJ3ggRvNvnCkdBoUA0NgskBnr5WDpSXG6BRRJM5.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('drivers')->insert([
            'id' => 17,
            'name' => 'Kelvin',
            'phone_number' => '029302025',
            'id_card_file_name' => 'drivers/q3ik7fNaGT7yScuoG2qRs3LrSMSrfw55OGerY1OY.jpg',
            'driver_license_file_name' => 'drivers/IeWn2nJTZL0ItGg6bAJkTWSi0cHbzOLH4JyC3cnN.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('drivers')->insert([
            'id' => 18,
            'name' => 'Kelvin',
            'phone_number' => '02930205',
            'id_card_file_name' => 'drivers/6DXu08dOhWIBqBqQaGvYZ1V0wCGuxJnGEZO8ENbK.jpg',
            'driver_license_file_name' => 'drivers/uVxlGPdQvyrq8okeu3yAujk65v1oiX4noJgYBJw1.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('drivers')->insert([
            'id' => 19,
            'name' => 'Iwan',
            'phone_number' => '029302056',
            'id_card_file_name' => 'drivers/drS4V182XQPBCVZ7LeG7aj9vIazmPBvjKZ4EWVTM.jpg',
            'driver_license_file_name' => 'drivers/RYgQSsuIWd4hrbunfbHrvpUhvx78gkm684fISAdn.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('drivers')->insert([
            'id' => 20,
            'name' => 'Syahrudin',
            'phone_number' => '0293020562',
            'id_card_file_name' => 'drivers/dXkIZmGrVBa1eA481Thp2CjQnST6UNWz0zyZyb5C.jpg',
            'driver_license_file_name' => 'drivers/6UNRq2Tv8PphnTxicEztL623rsXVR0bGtISZo86Y.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('drivers')->insert([
            'id' => 21,
            'name' => 'Muklis',
            'phone_number' => '02930205665',
            'id_card_file_name' => 'drivers/CEE299vrMeFF1kU3QvsCAA0ZwTFDY96rbdP0Ni8v.jpg',
            'driver_license_file_name' => 'drivers/g07SabvfFutyKmcbMT2bFRPmLmTR7IQFfTlkiFc6.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('drivers')->insert([
            'id' => 22,
            'name' => 'Yayan',
            'phone_number' => '0293020566',
            'id_card_file_name' => 'drivers/6yHXnmQvLi1Bfij4FHDQUIcugxsGAwil4B4CPwpY.jpg',
            'driver_license_file_name' => 'drivers/mXReVaU2UtdYMuQ6oeEgx5KD4Eq3GssTnDZK3WgZ.jpg',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
