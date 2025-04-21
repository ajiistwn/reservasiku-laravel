<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $transactions = [
            // Januari 2025
            [
                'reservation_id' => 1,
                'amount' => 450000,
                'status' => 'success',
                'created_at' => '2025-01-05 14:00:00',
                'updated_at' => '2025-01-05 14:00:00',
            ],
            [
                'reservation_id' => 2,
                'amount' => 300000,
                'status' => 'failure',
                'created_at' => '2025-01-15 13:00:00',
                'updated_at' => '2025-01-15 13:00:00',
            ],
            // Februari 2025
            [
                'reservation_id' => 3,
                'amount' => 550000,
                'status' => 'success',
                'created_at' => '2025-02-07 15:00:00',
                'updated_at' => '2025-02-07 15:00:00',
            ],
            [
                'reservation_id' => 4,
                'amount' => 700000,
                'status' => 'failure',
                'created_at' => '2025-02-20 14:00:00',
                'updated_at' => '2025-02-20 14:00:00',
            ],
            // Maret 2025
            [
                'reservation_id' => 5,
                'amount' => 300000,
                'status' => 'success',
                'created_at' => '2025-03-10 14:30:00',
                'updated_at' => '2025-03-10 14:30:00',
            ],
            [
                'reservation_id' => 6,
                'amount' => 550000,
                'status' => 'success',
                'created_at' => '2025-03-15 15:00:00',
                'updated_at' => '2025-03-15 15:00:00',
            ],
            // April 2025
            [
                'reservation_id' => 7,
                'amount' => 700000,
                'status' => 'pending',
                'created_at' => '2025-04-05 13:00:00',
                'updated_at' => '2025-04-05 13:00:00',
            ],
            [
                'reservation_id' => 8,
                'amount' => 450000,
                'status' => 'success',
                'created_at' => '2025-04-20 14:00:00',
                'updated_at' => '2025-04-20 14:00:00',
            ],
        ];

        DB::table('transactions')->insert($transactions);
    }
}
