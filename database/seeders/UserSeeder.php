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
                'phone' => '0896359985',
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
                'phone' => '08123783789',
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
                'phone' => '08543456789',
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
                'phone' => '08543456129',
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
                'phone' => '08234456129',
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
                'phone' => '08134256129',
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
                'phone' => '081234561293',
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
