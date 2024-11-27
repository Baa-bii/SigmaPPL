<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar mata kuliah dan kelas
        $mataKuliah = [
            'PAIK6501',
            'PAIK6702',
            'PAIK6502',
            'PAIK6504',
            'PAIK6503',
            'PAIK6505',
            'PAIK6701',
            'PAIK6406',
            'PAIK6404',
            'PAIK6301',
            'PAIK6303',
            'PAIK65204',
            'PAIK6102',
        ];

        $kelas = ['A', 'B', 'C', 'D'];
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jam = 1; // Mulai dari jam pertama
        $hariIndex = 0; // Mulai dari hari pertama

        foreach ($mataKuliah as $kodeMk) {
            foreach ($kelas as $kelasItem) {
                DB::table('jadwal')->insert([
                    'hari' => $hari[$hariIndex], // Ambil hari berdasarkan index
                    'kelas' => $kelasItem,
                    'id_waktu' => $jam, // Jam kuliah
                    'id_TA' => 1, // Contoh tahun akademik
                    'id_ruang' => ($jam % 8) + 1, // Ruangan (berulang dari 1-8)
                    'kode_mk' => $kodeMk, // Mata kuliah
                    'kode_prodi' => 'INF123', // Program studi
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Tambah jam, reset ke 1 jika melebihi 6
                $jam++;
                if ($jam > 6) {
                    $jam = 1; // Reset ke jam pertama
                    $hariIndex = ($hariIndex + 1) % count($hari); // Ganti ke hari berikutnya
                }
            }
        }
    }
}
