<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\KHS;

class khsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

           // Ambil id_TA dari semester_aktif yang relevan
           $id_TA_Genap_2023 = DB::table('semester_aktif')
           ->where('tahun_akademik', '2023/2024 Genap')
           ->where('semester', 4)
           ->first()->id; // Ambil id semester aktif

        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6102',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6101',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00007',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6105',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00005',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6103',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6104',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00003',
            'id_TA' => $id_TA_Ganjil_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6202',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6204',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00011',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6603',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6203',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00004',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6402',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00006',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6201',
            'id_TA' => $id_TA_Genap_2022,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6301',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6306',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6303',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6302',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6304',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6506',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6305',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00008',
            'id_TA' => $id_TA_Ganjil_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6406',
            'id_TA' => $id_TA_Genap_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6404',
            'id_TA' => $id_TA_Genap_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6401',
            'id_TA' => $id_TA_Genap_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6403',
            'id_TA' => $id_TA_Genap_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6405',
            'id_TA' => $id_TA_Genap_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KHS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6601',
            'id_TA' => $id_TA_Genap_2023,
            'nilai' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
