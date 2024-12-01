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
        
        // Nonaktifkan foreign key constraint sementara
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
    // Hapus semua data di tabel jadwal
    DB::table('jadwal')->truncate();

    // Aktifkan kembali foreign key constraint
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Ambil id_TA dari semester_aktif yang relevan
        $id_TA_Ganjil_2022 = DB::table('semester_aktif')
        ->where('tahun_akademik', '2022/2023 Ganjil')
        ->where('semester', 1)
        ->first()->id; // Ambil id semester aktif

        // Ambil id_TA dari semester_aktif yang relevan
        $id_TA_Genap_2022 = DB::table('semester_aktif')
            ->where('tahun_akademik', '2022/2023 Genap')
            ->where('semester', 2)
            ->first()->id; // Ambil id semester aktif

        // Ambil id_TA dari semester_aktif yang relevan
        $id_TA_Ganjil_2023 = DB::table('semester_aktif')
            ->where('tahun_akademik', '2023/2024 Ganjil')
            ->where('semester', 3)
            ->first()->id; // Ambil id semester aktif

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

         // Ambil id_ruang berdasarkan nama ruang
         $id_ruang_A204 = DB::table('ruang')
         ->where('nama', '204')
         ->where('gedung', 'A')
         ->first()->id;

         // Ambil id_ruang berdasarkan nama ruang
         $id_ruang_B201 = DB::table('ruang')
         ->where('nama', '201')
         ->where('gedung', 'B')
         ->first()->id;

          // Ambil id_ruang berdasarkan nama ruang
          $id_ruang_OR = DB::table('ruang')
          ->where('nama', 'Stadion')
          ->where('gedung', 'OR')
          ->first()->id;

        // tahun ajaran 2022/2023 ganjil smt 1
        Jadwal::create([
            'id_jadwal' =>'JDWDASPROD',
            'hari' => 'Senin',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_A204,
            'kode_mk' => 'PAIK6102', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMAT1',
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_B201,
            'kode_mk' => 'PAIK6101', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWINGGRISD',
            'hari' => 'Rabu',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_08,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'UUW00007', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWSTRUKDISD',
            'hari' => 'Rabu',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_K101,
            'kode_mk' => 'PAIK6105', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWORB',
            'hari' => 'Rabu',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_OR,
            'kode_mk' => 'UUW00005', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWDASISD',
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6103', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWLOGIFD',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_E102,
            'kode_mk' => 'PAIK6104', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPKND',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Ganjil_2022,
            'id_ruang' => $id_ruang_B201,
            'kode_mk' => 'UUW00003', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // tahun ajaran 2022/2023 genap smt 2
        Jadwal::create([
            'id_jadwal' =>'JDWJARKOMG',
            'hari' => 'Kamis',
            'kelas' => 'G',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6402', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWALPROD',
            'hari' => 'Senin',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_14,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6202', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWALIND',
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6204', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPAID',
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'UUW00011', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMEPA',
            'hari' => 'Selasa',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6603', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWOAKD',
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6203', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWINDOD',
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_K202,
            'kode_mk' => 'UUW00004', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWIOTD',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'UUW00006', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMAT2',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Genap_2022,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6201', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         // tahun ajaran 2023/2024 ganjil smt 3
        Jadwal::create([
            'id_jadwal' =>'JDWSTRUKDAT',
            'hari' => 'Senin',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_E102,
            'kode_mk' => 'PAIK6301', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
         
        Jadwal::create([
            'id_jadwal' =>'JDWSTATISD',
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_10,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6306', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWBASDATD',
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6303', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWSOD',
            'hari' => 'Rabu',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_E102,
            'kode_mk' => 'PAIK6302', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMETNUM',
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6304', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWKJID',
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_K102,
            'kode_mk' => 'PAIK6506', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWIMKD',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6305', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWKWUD',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Ganjil_2023,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'UUW00008', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Insert data jadwal hari senin
        Jadwal::create([
            'id_jadwal' =>'JDWSISCERB',
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
            'id_jadwal' =>'JDWGKVC',
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
            'id_jadwal' =>'JDWPBOA',
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
            'id_jadwal' =>'JDWSISCERD',
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
            'id_jadwal' =>'JDWSISCERA',
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
            'id_jadwal' =>'JDWGKVB',
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
            'id_jadwal' =>'JDWPBOC',
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
            'id_jadwal' =>'JDWSISCERC',
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
            'id_jadwal' =>'JDWGKVD',
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
            'id_jadwal' =>'JDWPBOB',
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
            'id_jadwal' =>'JDWASAC',
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
            'id_jadwal' =>'JDWGKVA',
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
            'id_jadwal' =>'JDWPBOD',
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
            'id_jadwal' =>'JDWMBDD',
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
            'id_jadwal' =>'JDWMBDA',
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
            'id_jadwal' =>'JDWASAA',
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
            'id_jadwal' =>'JDWRPLA',
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
            'id_jadwal' =>'JDWRPLD',
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
            'id_jadwal' =>'JDWMBDC',
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
            'id_jadwal' =>'JDWASAB',
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
            'id_jadwal' =>'JDWRPLC',
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
            'id_jadwal' =>'JDWMBDB',
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
            'id_jadwal' =>'JDWASAD',
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
            'id_jadwal' =>'JDWRPLB',
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

        // jadwal tahun ganjil 2024/2025 semester 5
        // Jadwal hari senin
        Jadwal::create([
            'id_jadwal' =>'JDWTBOC',
            'hari' => 'Senin',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6702', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPBPA',
            'hari' => 'Senin',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6501', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWTBOD',
            'hari' => 'Senin',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6702', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPBPB',
            'hari' => 'Senin',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6501', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Jadwal hari selasa
        Jadwal::create([
            'id_jadwal' =>'JDWTBOA',
            'hari' => 'Selasa',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6702', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPBPC',
            'hari' => 'Selasa',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6501', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWTBOB',
            'hari' => 'Selasa',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6702', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPBPD',
            'hari' => 'Selasa',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6501', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Jadwal hari rabu
        Jadwal::create([
            'id_jadwal' =>'JDWPPLB',
            'hari' => 'Rabu',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_K202,
            'kode_mk' => 'PAIK6504', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWKTPA',
            'hari' => 'Rabu',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6502', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMLD',
            'hari' => 'Rabu',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6505', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWKTPB',
            'hari' => 'Rabu',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6502', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPPLA',
            'hari' => 'Rabu',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6504', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWKTPC',
            'hari' => 'Rabu',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6502', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPPLD',
            'hari' => 'Rabu',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6504', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMPIA',
            'hari' => 'Rabu',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_K202,
            'kode_mk' => 'PAIK6701', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //jadwal hari kamis
        Jadwal::create([
            'id_jadwal' =>'JDWMLC',
            'hari' => 'Kamis',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6505', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWSIA',
            'hari' => 'Kamis',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6503', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMLA',
            'hari' => 'Kamis',
            'kelas' => 'A',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6505', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWSIB',
            'hari' => 'Kamis',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_13,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6503', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWSIC',
            'hari' => 'Kamis',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6503', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWKTPD',
            'hari' => 'Kamis',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_A303,
            'kode_mk' => 'PAIK6502', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMPIB',
            'hari' => 'Kamis',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6701', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //jadwal hari jumat
        Jadwal::create([
            'id_jadwal' =>'JDWMLB',
            'hari' => 'Jumat',
            'kelas' => 'B',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E102,
            'kode_mk' => 'PAIK6505', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWSID',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_07,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6503', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMPIC',
            'hari' => 'Jumat',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_940,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E103,
            'kode_mk' => 'PAIK6701', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWMPID',
            'hari' => 'Jumat',
            'kelas' => 'D',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E102,
            'kode_mk' => 'PAIK6701', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Jadwal::create([
            'id_jadwal' =>'JDWPPLC',
            'hari' => 'Jumat',
            'kelas' => 'C',
            'id_waktu' => $id_waktu_1540,
            'id_TA' => $id_TA_Ganjil_2024,
            'id_ruang' => $id_ruang_E101,
            'kode_mk' => 'PAIK6504', 
            'kode_prodi' => 'INF123', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
