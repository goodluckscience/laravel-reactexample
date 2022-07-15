<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property_names = [
            'Sunshine House, Bristol',
            'Seaview Bungalow, Brighton',
            'Pizzeria in Eastbourne',
            '1500 Park Lane, London, AB1 2CD',
            'Hospital in Basildon',
            'Cafe Lake View in Writtle',
            'Nice Gifts, shop in Norwich',
            'Forest Lake, Hotel in Epping',
        ];

        shuffle($property_names);

        for($i=0; $i<8; $i++) {
            DB::table('properties')->insert(['name' => $property_names[$i]]);
        }
    }
}
