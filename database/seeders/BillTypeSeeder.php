<?php

namespace Database\Seeders;

use App\Models\BillType;
use Illuminate\Database\Seeder;

class BillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add this array
        $type_name = [
            [
                'id' => 1,
                'name' => 'Rental'
            ],
            [
                'id' => 2,
                'name' => 'Meralco'
            ],
            [
                'id' => 3,
                'name' => 'Maynilad'
            ]
        ];

        foreach($type_name as $typename) {
            BillType::create($typename);
        }
    }
}
