<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BillPaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BillPaymentStatusSeeder extends Seeder
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
                'name' => 'Paid'
            ],
            [
                'id' => 2,
                'name' => 'Not Paid'
            ]
        ];

        foreach($status_name as $statusname) {
            BillPaymentStatus::create($statusname);
        }
    }
}
