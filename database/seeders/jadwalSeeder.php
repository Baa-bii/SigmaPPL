<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil id_TA dari semester_aktif yang relevan
        $id_TA_Genap_2023 = DB::table('semester_aktif')
            ->where('tahun_akademik', '2023/2024 Genap')
            ->where('semester', 4)
            ->first()->id; // Ambil id semester aktif
        
        // Ambil id_TA dari semester_aktif yang relevan
        $id_TA_Ganjil_2024 = DB::table('semester_aktif')
            ->where('tahun_akademik', '2024/2025 Ganjil')
            ->where('semester', 5)
            ->first()->id; // Ambil id semester aktif

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_0650 = DB::table('waktu')
            ->where('jam_mulai', '06:50:00')
            ->first()->id;

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_07 = DB::table('waktu')
            ->where('jam_mulai', '07:00:00')
            ->first()->id;

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_08 = DB::table('waktu')
            ->where('jam_mulai', '08:00:00')
            ->first()->id;

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_09 = DB::table('waktu')
            ->where('jam_mulai', '09:00:00')
            ->first()->id;

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_940 = DB::table('waktu')
            ->where('jam_mulai', '09:40:00')
            ->first()->id;

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_10 = DB::table('waktu')
            ->where('jam_mulai', '10:00:00')
            ->first()->id;
        
        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_13 = DB::table('waktu')
            ->where('jam_mulai', '13:00:00')
            ->first()->id;

        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_14 = DB::table('waktu')
            ->where('jam_mulai', '14:00:00')
            ->first()->id;
        
        // Ambil id_waktu berdasarkan jam_mulai 
        $id_waktu_1540 = DB::table('waktu')
            ->where('jam_mulai', '15:40:00')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_E101 = DB::table('ruang')
            ->where('nama', '101')
            ->where('gedung', 'E')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_E102 = DB::table('ruang')
            ->where('nama', '102')
            ->where('gedung', 'E')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_E103 = DB::table('ruang')
            ->where('nama', '103')
            ->where('gedung', 'E')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_A303 = DB::table('ruang')
            ->where('nama', '303')
            ->where('gedung', 'A')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_K101 = DB::table('ruang')
            ->where('nama', '101')
            ->where('gedung', 'K')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_K102 = DB::table('ruang')
            ->where('nama', '102')
            ->where('gedung', 'K')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_K202 = DB::table('ruang')
            ->where('nama', '202')
            ->where('gedung', 'K')
            ->first()->id;

        // Ambil id_ruang berdasarkan nama ruang
        $id_ruang_A304 = DB::table('ruang')
            ->where('nama', '304')
            ->where('gedung', 'A')
            ->first()->id;

        // Insert data jadwal hari senin
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6406', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6404', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6401', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6406', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6406', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A304,
            'kode_mk' => 'PAIK6404', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6401', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data jadwal hari selasa
        Jadwal::create([
            'hari' => 'Selasa',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6406', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6404', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6401', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6601', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6404', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6401', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data jadwal hari rabu
        Jadwal::create([
            'hari' => 'Rabu',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6403', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Rabu',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6403', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Rabu',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K202,
            'kode_mk' => 'PAIK6601', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Rabu',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6405', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data jadwal hari Kamis
        Jadwal::create([
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6405', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Kamis',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6403', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Kamis',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6601', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Kamis',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6405', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Kamis',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K101,
            'kode_mk' => 'PAIK6403', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data jadwal hari jumat
        Jadwal::create([
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_0650,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6601', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'hari' => 'Jumat',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6405', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan entri lainnya sesuai kebutuhan
    }
}
