<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Wi-Fi',
                'icon' => 'wifi',
                'property' => true,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parking',
                'icon' => 'square-parking',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AC',
                'icon' => 'air-vent',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shower',
                'icon' => 'shower-head',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'bathup',
                'icon' => 'bath',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tv',
                'icon' => 'tv',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pool',
                'icon' => 'swimming-pool',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'name' => 'Gym',
                'icon' => 'dumbbell',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        DB::table('facilities')->insert($facilities);   //
    }
}
