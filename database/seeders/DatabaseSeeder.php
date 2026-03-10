<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user',
            'accept' => 'yes',
        ]);

        \DB::table('setting_absensi')->insert([
            'waktu_buka' => '08:00:00',
            'waktu_tutup' => '17:00:00',
            'buka_otomatis' => 'ya',
            'tutup_otomatis' => 'ya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => \Hash::make('password'),
            'role' => 'admin',
            'accept' => 'yes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
