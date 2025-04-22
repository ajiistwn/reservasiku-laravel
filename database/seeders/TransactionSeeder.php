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
                'amount' => 2250000,
                'status' => 'success',
                'created_at' => '2025-01-05 14:00:00',
                'updated_at' => '2025-01-05 14:00:00',
            ],
            [
                'reservation_id' => 2,
                'amount' => 900000,
                'status' => 'failure',
                'created_at' => '2025-01-15 13:00:00',
                'updated_at' => '2025-01-15 13:00:00',
            ],
            [
                'reservation_id' => 3,
                'amount' => 3000000,
                'status' => 'success',
                'created_at' => '2025-01-05 14:00:00',
                'updated_at' => '2025-01-05 14:00:00',
            ],
            [
                'reservation_id' => 4,
                'amount' => 2550000,
                'status' => 'failure',
                'created_at' => '2025-01-15 13:00:00',
                'updated_at' => '2025-01-15 13:00:00',
            ],
            [
                'reservation_id' => 5,
                'amount' => 1500000,
                'status' => 'success',
                'created_at' => '2025-01-25 14:00:00',
                'updated_at' => '2025-01-25 14:00:00',
            ],
            // Februari 2025
            [
                'reservation_id' => 6,
                'amount' => 1600000,
                'status' => 'success',
                'created_at' => '2025-02-07 15:00:00',
                'updated_at' => '2025-02-07 15:00:00',
            ],
            [
                'reservation_id' => 7,
                'amount' => 1400000,
                'status' => 'failure',
                'created_at' => '2025-02-20 14:00:00',
                'updated_at' => '2025-02-20 14:00:00',
            ],
            [
                'reservation_id' => 8,
                'amount' => 1200000,
                'status' => 'success',
                'created_at' => '2025-02-07 15:00:00',
                'updated_at' => '2025-02-07 15:00:00',
            ],
            [
                'reservation_id' => 9,
                'amount' => 1200000,
                'status' => 'failure',
                'created_at' => '2025-02-20 14:00:00',
                'updated_at' => '2025-02-20 14:00:00',
            ],
            [
                'reservation_id' => 10,
                'amount' => 2550000,
                'status' => 'success',
                'created_at' => '2025-02-25 13:00:00',
                'updated_at' => '2025-02-25 13:00:00',
            ],
            // Maret 2025
            [
                'reservation_id' => 11,
                'amount' => 600000,
                'status' => 'success',
                'created_at' => '2025-03-10 14:30:00',
                'updated_at' => '2025-03-10 14:30:00',
            ],
            [
                'reservation_id' => 12,
                'amount' => 1650000,
                'status' => 'success',
                'created_at' => '2025-03-15 15:00:00',
                'updated_at' => '2025-03-15 15:00:00',
            ],
            [
                'reservation_id' => 13,
                'amount' =>1000000,
                'status' => 'success',
                'created_at' => '2025-03-10 14:30:00',
                'updated_at' => '2025-03-10 14:30:00',
            ],
            [
                'reservation_id' => 14,
                'amount' => 1500000,
                'status' => 'success',
                'created_at' => '2025-03-15 15:00:00',
                'updated_at' => '2025-03-15 15:00:00',
            ],
            [
                'reservation_id' => 15,
                'amount' => 1700000,
                'status' => 'pending',
                'created_at' => '2025-03-25 13:00:00',
                'updated_at' => '2025-03-25 13:00:00',
            ],
            // April 2025
            [
                'reservation_id' => 16,
                'amount' => 2100000,
                'status' => 'pending',
                'created_at' => '2025-04-05 13:00:00',
                'updated_at' => '2025-04-05 13:00:00',
            ],
            [
                'reservation_id' => 17,
                'amount' => 900000,
                'status' => 'success',
                'created_at' => '2025-04-20 14:00:00',
                'updated_at' => '2025-04-20 14:00:00',
            ],
            [
                'reservation_id' => 18,
                'amount' => 1800000,
                'status' => 'pending',
                'created_at' => '2025-04-05 13:00:00',
                'updated_at' => '2025-04-05 13:00:00',
            ],
            [
                'reservation_id' => 19,
                'amount' => 1700000,
                'status' => 'success',
                'created_at' => '2025-04-20 14:00:00',
                'updated_at' => '2025-04-20 14:00:00',
            ],
            [
                'reservation_id' => 20,
                'amount' => 1050000,
                'status' => 'success',
                'created_at' => '2025-04-27 15:00:00',
                'updated_at' => '2025-04-27 15:00:00',
            ],
        ];

        DB::table('transactions')->insert($transactions);
    }
}
