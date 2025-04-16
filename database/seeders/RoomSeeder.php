<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rooms = [
            [
                'name' => 'Deluxe Rice View',
                'price' => 450000,
                'description' => 'Kamar dengan pemandangan sawah dan balkon pribadi.',
                'bed' => '1 King Bed',
                'status' => true,
                'unit' => 3,
                'property_id' => 1,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomUbud11.jpeg',
                    'uploads/room/roomDummy/roomUbud12.jpeg',
                    'uploads/room/roomDummy/roomUbud13.jpeg',
                    'uploads/room/roomDummy/roomUbud14.webp',
                    'uploads/room/roomDummy/roomUbud15.jpeg',
                    'uploads/room/roomDummy/roomUbud16.webp',
                    
                    
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Room',
                'price' => 300000,
                'description' => 'Kamar nyaman dengan fasilitas lengkap.',
                'bed' => '1 Queen Bed',
                'status' => true,
                'unit' => 5,
                'property_id' => 1,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomUbud21.jpeg',
                    'uploads/room/roomDummy/roomUbud22.webp',
                    'uploads/room/roomDummy/roomUbud23.webp',
                    'uploads/room/roomDummy/roomUbud24.jpeg',
                    'uploads/room/roomDummy/roomUbud25.jpeg',  
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bromo View Suite',
                'price' => 550000,
                'description' => 'Suite dengan pemandangan Gunung Bromo.',
                'bed' => '2 Twin Bed',
                'status' => true,
                'unit' => 2,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomBromo1.jpeg',
                    'uploads/room/roomDummy/roomBromo2.jpeg',  
                ]),
                'property_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beach Front Room',
                'price' => 700000,
                'description' => 'Kamar langsung menghadap pantai dengan teras.',
                'bed' => '1 King Bed',
                'status' => true,
                'unit' => 4,
                'property_id' => 3,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomBali1.jpeg',
                    'uploads/room/roomDummy/roomBali2.jpeg',
                    'uploads/room/roomDummy/roomBali3.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Puncak Family Room',
                'price' => 600000,
                'description' => 'Kamar keluarga dengan pemandangan kebun.',
                'bed' => '2 Double Bed',
                'status' => true,
                'unit' => 3,
                'property_id' => 4,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomBogor11.jpg',
                    'uploads/room/roomDummy/roomBogor12.jpg',  
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Romantic Suite Lombok',
                'price' => 850000,
                'description' => 'Suite romantis dengan kolam renang pribadi.',
                'bed' => '1 King Bed',
                'status' => true,
                'unit' => 2,
                'property_id' => 5,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomLombok11.jpg',
                    'uploads/room/roomDummy/roomLombok12.jpeg',
                    'uploads/room/roomDummy/roomLombok13.jpeg',
                    'uploads/room/roomDummy/roomLombok14.jpg',  
                ]),  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Superior Room Lombok',
                'price' => 500000,
                'description' => 'Kamar superior dekat pantai, cocok untuk pasangan.',
                'bed' => '1 Queen Bed',
                'status' => true,
                'unit' => 4,
                'property_id' => 5,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomLombok21.jpg',
                    'uploads/room/roomDummy/roomLombok22.jpeg',
                    'uploads/room/roomDummy/roomLombok23.jpeg',
                    'uploads/room/roomDummy/roomLombok24.jpeg',  
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eco Garden Room',
                'price' => 350000,
                'description' => 'Kamar ramah lingkungan dengan taman pribadi.',
                'bed' => '1 Double Bed',
                'status' => true,
                'unit' => 3,
                'property_id' => 4,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomBogor21.jpg',
                    'uploads/room/roomDummy/roomBogor22.jpg',  
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('rooms')->insert($rooms);
    }
}
