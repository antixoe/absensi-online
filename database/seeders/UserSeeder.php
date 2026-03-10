<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@absensi.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'accept' => 'yes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create sample users
        $users = [
            [
                'name' => 'Ahmad Rahman',
                'email' => 'ahmad.rahman@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya.sari@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Rizki Pratama',
                'email' => 'rizki.pratama@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Fajar Nugroho',
                'email' => 'fajar.nugroho@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Intan Permata',
                'email' => 'intan.permata@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Gilang Ramadhan',
                'email' => 'gilang.ramadhan@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
            [
                'name' => 'Nadia Putri',
                'email' => 'nadia.putri@company.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'accept' => 'yes',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert(array_merge($user, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}