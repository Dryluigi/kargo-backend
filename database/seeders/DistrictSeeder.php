<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            'name' => 'Jakarta'
        ]);
        DB::table('districts')->insert([
            'name' => 'Surabaya'
        ]);
        DB::table('districts')->insert([
            'name' => 'Bandung'
        ]);
        DB::table('districts')->insert([
            'name' => 'Tangerang'
        ]);
        DB::table('districts')->insert([
            'name' => 'Depok'
        ]);
        DB::table('districts')->insert([
            'name' => 'Semarang'
        ]);
        DB::table('districts')->insert([
            'name' => 'Bogor'
        ]);
        DB::table('districts')->insert([
            'name' => 'Malang'
        ]);
        DB::table('districts')->insert([
            'name' => 'Tasikmalaya'
        ]);
        DB::table('districts')->insert([
            'name' => 'Surakarta'
        ]);
        DB::table('districts')->insert([
            'name' => 'Cimahi'
        ]);
        DB::table('districts')->insert([
            'name' => 'Yogyakarta'
        ]);
        DB::table('districts')->insert([
            'name' => 'Cilegon'
        ]);
        DB::table('districts')->insert([
            'name' => 'Sukabumi'
        ]);
        DB::table('districts')->insert([
            'name' => 'Cirebon'
        ]);
        DB::table('districts')->insert([
            'name' => 'Pekalongan'
        ]);
        DB::table('districts')->insert([
            'name' => 'Kediri'
        ]);
        DB::table('districts')->insert([
            'name' => 'Tegal'
        ]);
        DB::table('districts')->insert([
            'name' => 'Probolinggo'
        ]);
    }
}
