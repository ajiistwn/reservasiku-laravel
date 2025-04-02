<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Aji Setiawan',
                'email' => 'ajiisetiawan09@gmail.com',
                'password' => bcrypt('Zenature09_'),
                'role' => 'admin',
                'country' => 'Indonesia',
                'city' => 'Depok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Axel',
                'email' => 'axel@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'business',
                'country' => 'Indonesia',
                'city' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'John Smith',
                'email' => 'john@example.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'country' => 'Indonesia',
                'city' => 'Bogor',
                'created_at' => now(),
                'updated_at' => now(),
            ]


        ];
        DB::table('users')->insert($users);
    }
}
