<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $reservations = [
            // Januari 2025
            [
                'room_id' => 1,
                'user_id' => 4,
                'check_in' => '2025-01-05 14:00:00',
                'check_out' => '2025-01-10 12:00:00',
                'created_at' => '2025-01-05 14:00:00',
                'updated_at' => '2025-01-05 14:00:00',
            ],
            [
                'room_id' => 2,
                'user_id' => 4,
                'check_in' => '2025-01-15 13:00:00',
                'check_out' => '2025-01-18 11:00:00',
                'created_at' => '2025-01-15 13:00:00',
                'updated_at' => '2025-01-15 13:00:00',
            ],
            // Februari 2025
            [

                'room_id' => 3,
                'user_id' => 5,
                'check_in' => '2025-02-07 15:00:00',
                'check_out' => '2025-02-10 12:00:00',
                'created_at' => '2025-02-07 15:00:00',
                'updated_at' => '2025-02-07 15:00:00',
            ],
            [
                'room_id' => 4,
                'user_id' => 4,
                'check_in' => '2025-02-20 14:00:00',
                'check_out' => '2025-02-22 11:00:00',
                'created_at' => '2025-02-20 14:00:00',
                'updated_at' => '2025-02-20 14:00:00',
            ],
            // Maret 2025
            [

                'room_id' => 2,
                'user_id' => 1,
                'check_in' => '2025-03-10 14:30:00',
                'check_out' => '2025-03-12 10:00:00',
                'created_at' => '2025-03-10 14:30:00',
                'updated_at' => '2025-03-10 14:30:00',
            ],
            [
                'room_id' => 3,
                'user_id' => 6,
                'check_in' => '2025-03-15 15:00:00',
                'check_out' => '2025-03-18 12:00:00',
                'created_at' => '2025-03-15 15:00:00',
                'updated_at' => '2025-03-15 15:00:00',
            ],
            // April 2025
            [
                'room_id' => 4,
                'user_id' => 7,
                'check_in' => '2025-04-05 13:00:00',
                'check_out' => '2025-04-08 11:00:00',
                'created_at' => '2025-04-05 13:00:00',
                'updated_at' => '2025-04-05 13:00:00',
            ],
            [
                'room_id' => 1,
                'user_id' => 6,
                'check_in' => '2025-04-20 14:00:00',
                'check_out' => '2025-04-22 11:00:00',
                'created_at' => '2025-04-20 14:00:00',
                'updated_at' => '2025-04-20 14:00:00',
            ],
        ];
        DB::table('reservations')->insert($reservations);

    }
}
