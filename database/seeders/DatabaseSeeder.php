<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\LocationSeeder;
use Database\Seeders\ApartmentStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Check if the table exists
        if(DB::table('apartment_statuses')->count()==0) {
            $this->call(ApartmentStatusSeeder::class);
        }

        // Check if the table exists
        if(DB::table('locations')->count()==0) {
            $this->call(LocationSeeder::class);
        }

    }
}
