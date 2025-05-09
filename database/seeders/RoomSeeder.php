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
                'unit' => 3,
                'property_id' => 4,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomBogor21.jpg',
                    'uploads/room/roomDummy/roomBogor22.jpg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // room inti
            [
                'name' => 'Deluxe Ocean View',
                'price' => 650000,
                'description' => 'Kamar dengan pemandangan laut dan balkon pribadi.',
                'bed' => '1 King Bed',
                'unit' => 2,
                'property_id' => 6,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomJimbaran1.jpeg',
                    'uploads/room/roomDummy/roomJimbaran2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Garden View',
                'price' => 480000,
                'description' => 'Kamar menghadap taman dengan fasilitas lengkap.',
                'bed' => '1 Queen Bed',
                'unit' => 4,
                'property_id' => 6,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomJimbaran3.jpeg',
                    'uploads/room/roomDummy/roomJimbaran4.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suite Mountain View',
                'price' => 550000,
                'description' => 'Kamar luas dengan pemandangan pegunungan.',
                'bed' => '1 King Bed',
                'unit' => 2,
                'property_id' => 7,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomPuncak1.jpeg',
                    'uploads/room/roomDummy/roomPuncak2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Room',
                'price' => 400000,
                'description' => 'Kamar nyaman cocok untuk pasangan.',
                'bed' => '1 Double Bed',
                'unit' => 3,
                'property_id' => 8,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomSurabaya1.jpeg',
                    'uploads/room/roomDummy/roomSurabaya2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Malioboro View Room',
                'price' => 520000,
                'description' => 'Kamar menghadap langsung ke Jalan Malioboro.',
                'bed' => '1 Queen Bed',
                'unit' => 2,
                'property_id' => 9,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomJogja1.jpeg',
                    'uploads/room/roomDummy/roomJogja2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Family Room Batu',
                'price' => 600000,
                'description' => 'Cocok untuk keluarga dengan anak-anak.',
                'bed' => '2 Queen Beds',
                'unit' => 2,
                'property_id' => 10,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomBatu1.jpeg',
                    'uploads/room/roomDummy/roomBatu2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seaside Room',
                'price' => 850000,
                'description' => 'Nikmati matahari terbenam dari balkon.',
                'bed' => '1 King Bed',
                'unit' => 1,
                'property_id' => 11,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomRajaAmpat1.jpeg',
                    'uploads/room/roomDummy/roomRajaAmpat2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business Room',
                'price' => 380000,
                'description' => 'Kamar dilengkapi meja kerja dan Wi-Fi cepat.',
                'bed' => '1 Single Bed',
                'unit' => 3,
                'property_id' => 12,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomMakassar1.jpeg',
                    'uploads/room/roomDummy/roomMakassar2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lembang Cozy Room',
                'price' => 460000,
                'description' => 'Kamar nyaman dengan pemanas dan view pegunungan.',
                'bed' => '1 Queen Bed',
                'unit' => 2,
                'property_id' => 13,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomLembang1.jpeg',
                    'uploads/room/roomDummy/roomLembang2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medan Executive Suite',
                'price' => 700000,
                'description' => 'Apartemen eksekutif dengan dapur pribadi.',
                'bed' => '1 King Bed',
                'unit' => 1,
                'property_id' => 9,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomMedan1.jpeg',
                    'uploads/room/roomDummy/roomMedan2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semarang Family Room',
                'price' => 550000,
                'description' => 'Ruang luas cocok untuk liburan keluarga.',
                'bed' => '2 Queen Beds',
                'unit' => 2,
                'property_id' => 10,
                'media' => json_encode([
                    'uploads/room/roomDummy/roomSemarang1.jpeg',
                    'uploads/room/roomDummy/roomSemarang2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // room second
            [
                'name' => 'Ocean Breeze Suite',
                'price' => 1400000,
                'description' => 'Kamar besar dengan balkon menghadap laut.',
                'bed' => '1 King Bed',
                'unit' => 2,
                'property_id' => 15,
                'media' => json_encode([
                    'uploads/room/roomDummy/amed1.jpeg',
                    'uploads/room/roomDummy/amed2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 12
            [
                'name' => 'Single Room AC',
                'price' => 2500000,
                'description' => 'Kamar kost lengkap dengan AC dan kamar mandi dalam.',
                'bed' => '1 Single Bed',
                'unit' => 1,
                'property_id' => 12,
                'media' => json_encode([
                    'uploads/room/roomDummy/kemang1.jpeg',
                    'uploads/room/roomDummy/kemang2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 13
            [
                'name' => 'Mountain View Room',
                'price' => 780000,
                'description' => 'Kamar nyaman dengan pemandangan Gunung Penanggungan.',
                'bed' => '1 Queen Bed',
                'unit' => 2,
                'property_id' => 13,
                'media' => json_encode([
                    'uploads/room/roomDummy/trawas1.jpeg',
                    'uploads/room/roomDummy/trawas2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 14
            [
                'name' => 'Economy Room',
                'price' => 400000,
                'description' => 'Cocok untuk backpacker atau perjalanan singkat.',
                'bed' => '1 Single Bed',
                'unit' => 3,
                'property_id' => 14,
                'media' => json_encode([
                    'uploads/room/roomDummy/palembang1.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 15
            [
                'name' => 'Sunrise Pool Villa',
                'price' => 1900000,
                'description' => 'Villa dengan private pool dan view matahari terbit.',
                'bed' => '1 King Bed',
                'unit' => 1,
                'property_id' => 15,
                'media' => json_encode([
                    'uploads/room/roomDummy/uluwatu1.jpeg',
                    'uploads/room/roomDummy/uluwatu2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 16
            [
                'name' => 'Kamar Kost Standard',
                'price' => 800000,
                'description' => 'Fasilitas WiFi, meja belajar, dan kasur springbed.',
                'bed' => '1 Single Bed',
                'unit' => 5,
                'property_id' => 16,
                'media' => json_encode([
                    'uploads/room/roomDummy/ugm1.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 17
            [
                'name' => 'Family Room',
                'price' => 520000,
                'description' => 'Kamar luas untuk keluarga kecil.',
                'bed' => '2 Queen Beds',
                'unit' => 2,
                'property_id' => 17,
                'media' => json_encode([
                    'uploads/room/roomDummy/solo1.jpeg',
                    'uploads/room/roomDummy/solo2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 18
            [
                'name' => 'Luxury Hillside Room',
                'price' => 1700000,
                'description' => 'Nikmati suasana sejuk dan private di Dago Hills.',
                'bed' => '1 King Bed',
                'unit' => 1,
                'property_id' => 18,
                'media' => json_encode([
                    'uploads/room/roomDummy/dago1.jpeg',
                    'uploads/room/roomDummy/dago2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 19
            [
                'name' => 'Kamar Kost Putri',
                'price' => 950000,
                'description' => 'Kamar dengan AC dan lemari besar.',
                'bed' => '1 Single Bed',
                'unit' => 4,
                'property_id' => 19,
                'media' => json_encode([
                    'uploads/room/roomDummy/cibubur1.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Property 20
            [
                'name' => 'Danau View Room',
                'price' => 720000,
                'description' => 'Kamar romantis menghadap Danau Toba.',
                'bed' => '1 Queen Bed',
                'unit' => 2,
                'property_id' => 20,
                'media' => json_encode([
                    'uploads/room/roomDummy/samosir1.jpeg',
                    'uploads/room/roomDummy/samosir2.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('rooms')->insert($rooms);
    }
}
