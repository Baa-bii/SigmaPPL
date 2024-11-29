<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IRS;

class IRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil id_TA dari semester aktif yang sedang berjalan
        $id_TA_Ganjil_2024 = DB::table('semester_aktif')
        ->where('tahun_akademik', '2024/2025 Ganjil') // Misalnya semester sekarang
        ->where('semester', 5)  // Semester yang sedang berjalan
        ->first()->id;
        
        // Ambil id_TA dari semester_aktif yang relevan
          $id_TA_Ganjil_2022 = DB::table('riwayat_semester_aktif')
          ->where('tahun_akademik', '2022/2023 Ganjil')
          ->where('semester', 1)
          ->first()->id; // Ambil id semester aktif

           // Ambil id_TA dari semester_aktif yang relevan
           $id_TA_Genap_2022 = DB::table('riwayat_semester_aktif')
           ->where('tahun_akademik', '2022/2023 Genap')
           ->where('semester', 2)
           ->first()->id; // Ambil id semester aktif

            // Ambil id_TA dari semester_aktif yang relevan
          $id_TA_Ganjil_2023 = DB::table('riwayat_semester_aktif')
          ->where('tahun_akademik', '2023/2024 Ganjil')
          ->where('semester', 3)
          ->first()->id; // Ambil id semester aktif

           // Ambil id_TA dari semester_aktif yang relevan
           $id_TA_Genap_2023 = DB::table('riwayat_semester_aktif')
           ->where('tahun_akademik', '2023/2024 Genap')
           ->where('semester', 4)
           ->first()->id; // Ambil id semester aktif

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6102',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6101',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00007',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6105',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00005',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6103',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6104',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00003',
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6202',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6204',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00011',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6603',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6203',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00004',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6402',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00006',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6201',
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6301',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6306',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6303',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6302',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6304',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6506',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6305',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00008',
            'id_riwayat_TA' => $id_TA_Ganjil_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6406',
            'id_riwayat_TA' => $id_TA_Genap_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6404',
            'id_riwayat_TA' => $id_TA_Genap_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6401',
            'id_riwayat_TA' => $id_TA_Genap_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6403',
            'id_riwayat_TA' => $id_TA_Genap_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6405',
            'id_riwayat_TA' => $id_TA_Genap_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6601',
            'id_riwayat_TA' => $id_TA_Genap_2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
