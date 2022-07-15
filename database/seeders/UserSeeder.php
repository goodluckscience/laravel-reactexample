<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_names = ['Robert', 'John', 'Matt', 'Eva', 'Jenny', 'Elisabeth'];
        $last_names = ['Hancock', 'Smith', 'Hicks', 'Kendall', 'Dean', 'Lynwood'];
        $admins = [true, true, false, false, false, false];

        shuffle($first_names);
        shuffle($last_names);
        shuffle($admins);

        for($i=0; $i<6; $i++) {
            DB::table('users')->insert([
                'first_name' => $first_names[$i],
                'last_name' => $last_names[$i],
                'email' => Str::random(10) . '@example.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'password' => Hash::make('password'),
                'is_admin' => array_pop($admins),
                'created_at' => Carbon::today()->subDays(rand(0, 365)),
                'updated_at' => now(),
            ]);
        }
    }
}
