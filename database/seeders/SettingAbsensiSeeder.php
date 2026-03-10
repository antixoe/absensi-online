<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingAbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_absensi')->insert([
            'waktu_buka' => '08:00:00',
            'waktu_tutup' => '17:00:00',
            'buka_otomatis' => 'ya',
            'tutup_otomatis' => 'ya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}