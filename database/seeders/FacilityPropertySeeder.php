<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $facilityProperty = [
            [
                'property_id' => 1,
                'facility_id' => 1,
            ],
            [
                'property_id' => 1,
                'facility_id' => 2,
            ],
            [
                'property_id' => 1,
                'facility_id' => 10,
            ],
            [
                'property_id' => 1,
                'facility_id' => 11,
            ],
            [
                'property_id' => 1,
                'facility_id' => 12,
            ],
            [
                'property_id' => 1,
                'facility_id' => 13,
            ],
            [
                'property_id' => 1,
                'facility_id' => 14,
            ],
            [
                'property_id' => 1,
                'facility_id' => 15,
            ],
            [
                'property_id' => 1,
                'facility_id' => 16,
            ],
            [
                'property_id' => 1,
                'facility_id' => 17,
            ],
            [
                'property_id' => 1,
                'facility_id' => 18,
            ],
            [
                'property_id' => 2,
                'facility_id' => 2,
            ],
            [
                'property_id' => 2,
                'facility_id' => 10,
            ],
            [
                'property_id' => 2,
                'facility_id' => 12,
            ],
            [
                'property_id' => 2,
                'facility_id' => 13,
            ],
            [
                'property_id' => 2,
                'facility_id' => 15,
            ],
            [
                'property_id' => 2,
                'facility_id' => 16,
            ],
            [
                'property_id' => 2,
                'facility_id' => 17,
            ],
            [
                'property_id' => 2,
                'facility_id' => 18,
            ],
            [
                'property_id' => 3,
                'facility_id' => 1,
            ],
            [
                'property_id' => 3,
                'facility_id' => 2,
            ],
            [
                'property_id' => 3,
                'facility_id' => 10,
            ],
            [
                'property_id' => 3,
                'facility_id' => 11,
            ],
            [
                'property_id' => 3,
                'facility_id' => 12,
            ],
            [
                'property_id' => 3,
                'facility_id' => 13,
            ],
            [
                'property_id' => 3,
                'facility_id' => 14,
            ],
            [
                'property_id' => 3,
                'facility_id' => 15,
            ],
            [
                'property_id' => 3,
                'facility_id' => 16,
            ],
            [
                'property_id' => 3,
                'facility_id' => 17,
            ],
            [
                'property_id' => 4,
                'facility_id' => 10,
            ],
            [
                'property_id' => 4,
                'facility_id' => 12,
            ],
            [
                'property_id' => 4,
                'facility_id' => 13,
            ],
            [
                'property_id' => 4,
                'facility_id' => 15,
            ],
            [
                'property_id' => 4,
                'facility_id' => 17,
            ],
            [
                'property_id' => 5,
                'facility_id' => 2,
            ],
            [
                'property_id' => 5,
                'facility_id' => 10,
            ],
            [
                'property_id' => 5,
                'facility_id' => 11,
            ],
            [
                'property_id' => 5,  
                'facility_id' => 12,
            ],
            [
                'property_id' => 5,
                'facility_id' => 13,
            ],
            [
                'property_id' => 5,
                'facility_id' => 17,
            ],
            [
                'property_id' => 5,
                'facility_id' => 18,
            ],

            
        ];
        DB::table('facility_property')->insert($facilityProperty);
    }
}
