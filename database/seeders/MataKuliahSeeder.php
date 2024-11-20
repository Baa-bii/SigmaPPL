<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliah')->insert([
            [
                'kode_mk' => 'PAIK6501',
                'nama_mk' => 'Pengembangan Berbasis Platform',
                'sks' => 4,
                'semester' => '5',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6702',
                'nama_mk' => 'Teori Bahasa dan Otomata',
                'sks' => 3,
                'semester' => '7',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6502',
                'nama_mk' => 'Komputasi Tersebar dan Paralel',
                'sks' => 3,
                'semester' => '5',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6504',
                'nama_mk' => 'Proyek Perangkat Lunak',
                'sks' => 3,
                'semester' => '5',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6503',
                'nama_mk' => 'Sistem Informasi',
                'sks' => 4,
                'semester' => '5',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6505',
                'nama_mk' => 'Pembelajaran Mesin',
                'sks' => 4,
                'semester' => '5',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6701',
                'nama_mk' => 'Metodologi Penelitian dan Penulisan Ilmiah',
                'sks' => 2,
                'semester' => '7',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_mk' => 'PAIK6406',
                'nama_mk' => 'Sistem Cerdas',
                'sks' => 3,
                'semester' => '4',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6404',
                'nama_mk' => 'Grafika dan Komputasi Visual',
                'sks' => 3,
                'semester' => '4',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6301',
                'nama_mk' => 'Struktur Data',
                'sks' => 4,
                'semester' => '3',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_mk' => 'PAIK6303',
                'nama_mk' => 'Basis Data',
                'sks' => 4,
                'semester' => '3',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK65204',
                'nama_mk' => 'Aljabar Linier',
                'sks' => 3,
                'semester' => '2',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'kode_mk' => 'PAIK6102',
                'nama_mk' => 'Dasar Pemrograman',
                'sks' => 3,
                'semester' => '1',
                'jenis_mk' => 'wajib',
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }
}
