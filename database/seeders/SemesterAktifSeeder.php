<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

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
            'status' => 'Aktif',
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
            'status' => 'Aktif',
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
            'status' => 'Aktif',
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
            'status' => 'Aktif',
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
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true, // Semester 5 aktif
        ]);
         // Semester 6 
         SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2024/2025 Genap',
            'semester' => '6',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false, 
        ]);
         // Semester 7 
         SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2025/2026 Ganjil',
            'semester' => '7',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false,
        ]);
         // Semester 8
         SemesterAktif::updateOrCreate([
            'tahun_akademik' => '2025/2026 Genap',
            'semester' => '8',
            'nim' => '24060122140999',
        ], [
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => false,
        ]);

        $tahunSekarang = 2024;
        $semesters = ['Ganjil', 'Genap'];

        // Ambil semua mahasiswa dari database
        $mahasiswaList = Mahasiswa::all();

        foreach ($mahasiswaList as $mahasiswa) {
            $tahunMasuk = (int)$mahasiswa->angkatan;
            $nim = $mahasiswa->nim;

            // Hitung jumlah semester hingga sekarang
            $totalSemester = ($tahunSekarang - $tahunMasuk) * 2 + 1;

            for ($semester = 1; $semester <= $totalSemester; $semester++) {
                $isActive = ($semester === $totalSemester) ? true : false;

                // Tentukan tahun akademik
                $tahunAkademikAwal = $tahunMasuk + intdiv($semester - 1, 2);
                $tahunAkademikAkhir = $tahunAkademikAwal + 1;
                $ganjilGenap = $semesters[($semester - 1) % 2];
                $tahunAkademik = "$tahunAkademikAwal/$tahunAkademikAkhir $ganjilGenap";

                // Tentukan status
                $status = $isActive ? ['Belum Registrasi', 'Aktif'][array_rand(['Belum Registrasi', 'Aktif'])] : 'Aktif';

                // Buat data semester_aktif
                SemesterAktif::updateOrCreate([
                    'tahun_akademik' => $tahunAkademik,
                    'semester' => $semester,
                    'nim' => $nim,
                ], [
                    'status' => $status,
                    'is_active' => $isActive,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
    }
}