<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $properties = [
            [
                'name' => 'Villa Sunset Ubud',
                'country' => 'Indonesia',
                'city' => 'Ubud',
                'price' => 1250000,
                'address' => 'Jalan Raya Ubud No. 99',
                'description' => 'Villa dengan pemandangan sawah dan kolam renang pribadi.',
                'status' => true,
                'user_id' => 2,
                'media' => json_encode([
                    'uploads/property/propertyDummy/propertyUbud1.jpeg',
                    'uploads/property/propertyDummy/propertyUbud2.jpeg',
                    'uploads/property/propertyDummy/propertyUbud3.jpeg',
                    'uploads/property/propertyDummy/propertyUbud4.jpeg',
                ]), 
              
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penginapan Gunung Bromo',
                'country' => 'Indonesia',
                'city' => 'Probolinggo',
                'price' => 650000,
                'address' => 'Desa Ngadisari No. 12',
                'description' => 'Penginapan nyaman dekat pintu masuk Taman Nasional Bromo.',
                'status' => true,
                'user_id' => 2,
                'media' => json_encode([
                    'uploads/property/propertyDummy/propertyBromo1.jpeg',
                    'uploads/property/propertyDummy/propertyBromo2.jpeg',
                    'uploads/property/propertyDummy/propertyBromo3.jpeg',
                    'uploads/property/propertyDummy/propertyBromo4.jpeg',
                    'uploads/property/propertyDummy/propertyBromo5.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Casa Pantai Bali',
                'country' => 'Indonesia',
                'city' => 'Kuta',
                'price' => 850000,
                'address' => 'Jalan Pantai Kuta No. 10',
                'description' => 'Rumah tepi pantai dengan akses langsung ke laut di Bali.',
                'status' => true,
                'user_id' => 2,
                'media' => json_encode([
                    'uploads/property/propertyDummy/propertyBali1.jpeg',
                    'uploads/property/propertyDummy/propertyBali2.jpeg',
                    'uploads/property/propertyDummy/propertyBali3.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Retreat Puncak Asri',
                'country' => 'Indonesia',
                'city' => 'Bogor',
                'price' => 700000,
                'address' => 'Jalan Raya Puncak KM 17',
                'description' => 'Retreat alami di Puncak dengan suasana sejuk dan asri.',
                'status' => false,
                'user_id' => 3,
                'media' => json_encode([
                    'uploads/property/propertyDummy/propertyBogor1.jpeg',
                    'uploads/property/propertyDummy/propertyBogor2.jpeg',
                    'uploads/property/propertyDummy/propertyBogor3.jpeg',
                    'uploads/property/propertyDummy/propertyBogor4.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tropical Hideaway Lombok',
                'country' => 'Indonesia',
                'city' => 'Lombok',
                'price' => 900000,
                'address' => 'Jalan Raya Senggigi No. 88',
                'description' => 'Vila tropis tersembunyi, cocok untuk liburan romantis.',
                'status' => true,
                'user_id' => 3,
                'media' => json_encode([
                    'uploads/property/propertyDummy/propertyLombok1.jpeg',
                    'uploads/property/propertyDummy/propertyLombok2.jpeg',
                    'uploads/property/propertyDummy/propertyLombok3.jpeg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('properties')->insert($properties);
    }
}
