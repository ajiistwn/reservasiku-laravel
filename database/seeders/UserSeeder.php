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
                'image' => 'uploads/profile/imageDummy/aji.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'Afdan',
                'email' => 'afdan@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'business',
                'country' => 'Indonesia',
                'city' => 'Jakarta',
                'image' => 'uploads/profile/imageDummy/afdan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'name' => 'Alvin',
                'email' => 'alvin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'business',
                'country' => 'Indonesia',
                'city' => 'depok',
                'image' => 'uploads/profile/imageDummy/alvin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'jhon doe',
                'email' => 'jhon@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'country' => 'Indonesia',
                'city' => 'depok',
                'image' => 'uploads/profile/imageDummy/jhon.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Erik',
                'email' => 'erik@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'country' => 'Indonesia',
                'city' => 'jakarta',
                'image' => 'uploads/profile/imageDummy/erik.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Linda',
                'email' => 'linda@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'country' => 'Indonesia',
                'city' => 'jakarta',
                'image' => 'uploads/profile/imageDummy/linda.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kurnia',
                'email' => 'kurnia@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'country' => 'Indonesia',
                'city' => 'jakarta',
                'image' => 'uploads/profile/imageDummy/avatars.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        DB::table('users')->insert($users);
    }
}
