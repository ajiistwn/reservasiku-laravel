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
                'name' => 'AC',
                'icon' => 'air-vent',
                'property' => true,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kulkas',
                'icon' => 'refrigerator',
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
                'name' => 'Bathup',
                'icon' => 'bath',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kamar Mandi',
                'icon' => 'toilet',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Microwave',
                'icon' => 'microwave',
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
                'name' => 'Netflix',
                'icon' => 'tv-minimal-play',
                'property' => false,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parkir',
                'icon' => 'square-parking',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karoke',
                'icon' => 'mic-vocal',
                'property' => true,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Renang',
                'icon' => 'swimming-pool',
                'property' => true,
                'room' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tempat Duduk',
                'icon' => 'armchair',
                'property' => true,
                'room' => true,
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
            ],
            [
                
                'name' => 'Lift',
                'icon' => 'door-closed',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Resepsionis 24jam',
                'icon' => 'clock-fading',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'name' => 'Resepsionis',
                'icon' => 'book-marked',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Restaurant',
                'icon' => 'utensils',
                'property' => true,
                'room' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('facilities')->insert($facilities);   //
    }
}
