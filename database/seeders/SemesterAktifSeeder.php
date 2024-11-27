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
            'tahun_akademik' => '2022/2023 Ganjil',
            'semester' => '1',
            'status' => 'Belum Registrasi',
            'nim' => '24060122140999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SemesterAktif::create([
            'tahun_akademik' => '2022/2023 Genap',
            'semester' => '2',
            'status' => 'Belum Registrasi',
            'nim' => '24060122140999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SemesterAktif::create([
            'tahun_akademik' => '2023/2024 Ganjil',
            'semester' => '3',
            'status' => 'Belum Registrasi',
            'nim' => '24060122140999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        SemesterAktif::create([
            'tahun_akademik' => '2023/2024 Genap',
            'semester' => '4',
            'status' => 'Belum Registrasi',
            'nim' => '24060122140999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
