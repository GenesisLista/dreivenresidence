<?php

namespace Database\Seeders;

use App\Models\ApartmentStatus;
use Illuminate\Database\Seeder;

class ApartmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add this array
        $status_name = [
            [
                'id' => 1,
                'status_name' => 'Vacant'
            ],
            [
                'id' => 2,
                'status_name' => 'Not vacant'
            ]
        ];

        foreach($status_name as $statusname) {
            ApartmentStatus::create($statusname);
        }

    }
}
