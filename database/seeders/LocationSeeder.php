<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add this array
        $name = [
            [
                'id' => 1,
                'name' => 'Sampaloc'
            ],
            [
                'id' => 2,
                'name' => 'Sta. Mesa'
            ],
            [
                'id' => 3,
                'name' => 'Roxas District'
            ],
            [
                'id' => 4,
                'name' => 'ALR Building'
            ]
        ];

        foreach($name as $locationname) {
            Location::create($locationname);
        }
    }
}
