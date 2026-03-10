<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RiwayatAbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users except admin
        $users = DB::table('users')->where('role', 'user')->get();

        $keteranganTypes = ['Masuk', 'Pulang', 'Izin', 'Sakit', 'Cuti'];
        $deskripsiTemplates = [
            'Masuk' => ['Hadir tepat waktu', 'Datang sesuai jadwal', 'Masuk kerja normal'],
            'Pulang' => ['Pulang sesuai waktu', 'Selesai kerja hari ini', 'Berakhir jam kerja'],
            'Izin' => ['Izin keluarga', 'Izin pribadi', 'Izin mendadak'],
            'Sakit' => ['Sakit demam', 'Sakit kepala', 'Sakit perut'],
            'Cuti' => ['Cuti tahunan', 'Cuti sakit', 'Cuti penting']
        ];

        $attendanceRecords = [];

        // Generate attendance records for the last 30 days
        for ($day = 0; $day < 30; $day++) {
            $date = Carbon::now()->subDays($day);

            foreach ($users as $user) {
                // Skip weekends for some users randomly
                if ($date->isWeekend() && rand(1, 10) > 7) {
                    continue;
                }

                // Random attendance type with higher probability for "Masuk"
                $weights = ['Masuk' => 70, 'Pulang' => 60, 'Izin' => 5, 'Sakit' => 3, 'Cuti' => 2];
                $keterangan = $this->weightedRandom($weights);

                // Skip if it's a weekend and not "Izin", "Sakit", or "Cuti"
                if ($date->isWeekend() && !in_array($keterangan, ['Izin', 'Sakit', 'Cuti'])) {
                    continue;
                }

                $deskripsi = $deskripsiTemplates[$keterangan][array_rand($deskripsiTemplates[$keterangan])];

                // Add some variation to timestamps
                $hourOffset = rand(-30, 30); // -30 to +30 minutes
                $createdAt = $date->copy()->setTime(8, 0, 0)->addMinutes($hourOffset);

                $attendanceRecords[] = [
                    'id_user' => $user->id,
                    'nama' => $user->name,
                    'email' => $user->email,
                    'keterangan' => $keterangan,
                    'deskripsi' => $deskripsi,
                    'gambar' => null, // No image for seed data
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ];
            }
        }

        // Insert in chunks to avoid memory issues
        foreach (array_chunk($attendanceRecords, 100) as $chunk) {
            DB::table('riwayat_absensi')->insert($chunk);
        }
    }

    /**
     * Get a weighted random selection from an array
     */
    private function weightedRandom($weights)
    {
        $totalWeight = array_sum($weights);
        $random = rand(1, $totalWeight);

        foreach ($weights as $item => $weight) {
            $random -= $weight;
            if ($random <= 0) {
                return $item;
            }
        }

        return array_key_first($weights); // fallback
    }
}