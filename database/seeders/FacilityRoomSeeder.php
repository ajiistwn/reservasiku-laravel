<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $facilityRoom = [
            [
                'room_id' => 1,
                'facility_id' => 1,
            ],
            [
                'room_id' => 1,
                'facility_id' => 2,
            ],
            [
                'room_id' => 1,
                'facility_id' => 3,
            ],
            [
                'room_id' => 1,
                'facility_id' => 4,
            ],
            [
                'room_id' => 1,
                'facility_id' => 5,
            ],
            [
                'room_id' => 1,
                'facility_id' => 6,
            ],
            [
                'room_id' => 1,
                'facility_id' => 7,
            ],
            [
                'room_id' => 1,
                'facility_id' => 8,
            ],
            [
                'room_id' => 1,
                'facility_id' => 11,
            ],
            [
                'room_id' => 1,
                'facility_id' => 13,
            ],
            [
                'room_id' => 2,
                'facility_id' => 1,
            ],
            [
                'room_id' => 2,
                'facility_id' => 2,
            ],
            [
                'room_id' => 2,
                'facility_id' => 3,
            ],
            [
                'room_id' => 2,
                'facility_id' => 4,
            ],
            [
                'room_id' => 2,
                'facility_id' => 6,
            ],
            [
                'room_id' => 2,
                'facility_id' => 7,
            ],
            [
                'room_id' => 2,
                'facility_id' => 8,
            ],
            [
                'room_id' => 2,
                'facility_id' => 9,
            ],
            [
                'room_id' => 3,
                'facility_id' => 1,
            ],
            [
                'room_id' => 3,
                'facility_id' => 2,
            ],
            [
                'room_id' => 3,
                'facility_id' => 3,
            ],
            [
                'room_id' => 3,
                'facility_id' => 4,
            ],
            [
                'room_id' => 3,
                'facility_id' => 6,
            ],
            [
                'room_id' => 3,
                'facility_id' => 8,
            ],
            [
                'room_id' => 3,
                'facility_id' => 13,
            ],
            [
                'room_id' => 4,
                'facility_id' => 1,
            ],
            [
                'room_id' => 4,
                'facility_id' => 2,
            ],
            [
                'room_id' => 4,
                'facility_id' => 3,
            ],
            [           
                'room_id' => 4,
                'facility_id' => 4,
            ],
            [
                'room_id' => 4,
                'facility_id' => 5,
            ],
            [
                'room_id' => 4,
                'facility_id' => 6,
            ],
            [
                'room_id' => 4,
                'facility_id' => 7,
            ],
            [
                'room_id' => 4,
                'facility_id' => 8,
            ],
            [
                'room_id' => 4,
                'facility_id' => 9,
            ],
            [
                'room_id' => 4,
                'facility_id' => 11,
            ],
            [
                'room_id' => 4,
                'facility_id' => 12,
            ],
            [
                'room_id' => 4,
                'facility_id' => 13,
            ],
            [
                'room_id' => 5,
                'facility_id' => 1,
            ],
            [
                'room_id' => 5,  
                'facility_id' => 2,
            ],
            [
                'room_id' => 5,
                'facility_id' => 3,
            ],
            [
                'room_id' => 5,
                'facility_id' => 4,
            ],
            [
                'room_id' => 5,
                'facility_id' => 6,
            ],
            [
                'room_id' => 5,  
                'facility_id' => 8,
            ],
            [
                'room_id' => 5,
                'facility_id' => 9,
            ],
            [
                'room_id' => 5,
                'facility_id' => 13,
            ],
            [
                'room_id' => 6,
                'facility_id' => 1,
            ],
            [
                'room_id' => 6,  
                'facility_id' => 2,
            ],
            [
                'room_id' => 6,
                'facility_id' => 3,
            ],
            [
                'room_id' => 6,
                'facility_id' => 4,
            ],
            [
                'room_id' => 6,
                'facility_id' => 5,
            ],
            [
                'room_id' => 6,
                'facility_id' => 6,
            ],
            [
                'room_id' => 6,
                'facility_id' => 7,
            ],
            [
                'room_id' => 6,  
                'facility_id' => 8,
            ],
            [
                'room_id' => 6,
                'facility_id' => 9,
            ],
            [
                'room_id' => 6,
                'facility_id' => 13,
            ],
            [
                'room_id' => 7,
                'facility_id' => 1,
            ],
            [
                'room_id' => 7,  
                'facility_id' => 2,
            ],
            [
                'room_id' => 7,
                'facility_id' => 3,
            ],
            [
                'room_id' => 7,
                'facility_id' => 4,
            ],
            [
                'room_id' => 7,
                'facility_id' => 5,
            ],
            [
                'room_id' => 7,
                'facility_id' => 6,
            ],
            [
                'room_id' => 7,
                'facility_id' => 7,
            ],
            [
                'room_id' => 7,  
                'facility_id' => 8,
            ],
            [
                'room_id' => 7,
                'facility_id' => 9,
            ],
            [
                'room_id' => 7,
                'facility_id' => 11,
            ],
            [
                'room_id' => 7,
                'facility_id' => 12,
            ],
            [
                'room_id' => 7,
                'facility_id' => 13,
            ],
            [
                'room_id' => 8,
                'facility_id' => 1,
            ],
            [
                'room_id' => 8,
                'facility_id' => 2,
            ],
            [
                'room_id' => 8,
                'facility_id' => 3,
            ],
            [           
                'room_id' => 8,
                'facility_id' => 4,
            ],
            [
                'room_id' => 8,
                'facility_id' => 6,
            ],
            [
                'room_id' => 8,
                'facility_id' => 7,
            ],
            [
                'room_id' => 8,
                'facility_id' => 8,
            ],
            [
                'room_id' => 8,
                'facility_id' => 9,
            ],
            [
                'room_id' => 8,
                'facility_id' => 13,
            ],
            
            
        ];
        DB::table('facility_room')->insert($facilityRoom);
    }
}
