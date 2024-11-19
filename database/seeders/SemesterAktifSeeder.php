<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SemesterAktif;

class SemesterAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SemesterAktif::create([
            'tahun_akademik' => '2024/2025 Ganjil',
            'Semester' => '5',
            'Status' => 'Belum Registrasi',
            'nim' => '24060122140999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
