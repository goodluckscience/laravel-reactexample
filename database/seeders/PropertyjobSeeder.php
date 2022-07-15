<?php

namespace Database\Seeders;

use App\Models\Propertyjob;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyjobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Propertyjob::factory(10)->create();
    }
}
