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
        // Menghapus semua data di tabel semester_aktif agar tidak ada duplikasi
        // SemesterAktif::truncate(); // Uncomment jika ingin menghapus data sebelumnya

        // Semester 1
        SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2022/2023 Ganjil',
            'semester' => '1',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false, // Semester 1 tidak aktif
        ]);

        // Semester 2
        SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2022/2023 Genap',
            'semester' => '2',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false, // Semester 2 tidak aktif
        ]);

        // Semester 3
        SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2023/2024 Ganjil',
            'semester' => '3',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false, // Semester 3 tidak aktif
        ]);

        // Semester 4
        SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2023/2024 Genap',
            'semester' => '4',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false, // Semester 4 tidak aktif
        ]);

        // Semester 5 (Aktif)
        SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2024/2025 Ganjil',
            'semester' => '5',
<<<<<<< HEAD
=======
            'status' => 'Belum Registrasi',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true, // Semester 5 aktif
        ]);
        
    }
}
