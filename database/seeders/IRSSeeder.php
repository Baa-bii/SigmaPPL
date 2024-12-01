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
<<<<<<< HEAD
            'id_jadwal' => 'JDWDASPROD',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6101',
<<<<<<< HEAD
            'id_jadwal' => 'JDWMAT1',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00007',
<<<<<<< HEAD
            'id_jadwal' => 'JDWINGGRISD',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6105',
<<<<<<< HEAD
            'id_jadwal' => 'JDWSTRUKDISD',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00005',
<<<<<<< HEAD
            'id_jadwal' => 'JDWORB',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6103',
<<<<<<< HEAD
            'id_jadwal' => 'JDWDASISD',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6104',
<<<<<<< HEAD
            'id_jadwal' => 'JDWLOGIFD',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00003',
<<<<<<< HEAD
            'id_jadwal' => 'JDWPKND',
            'id_TA' => $id_TA_Ganjil_2022,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6202',
<<<<<<< HEAD
            'id_jadwal' =>'JDWALPROD',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6204',
<<<<<<< HEAD
            'id_jadwal' => 'JDWALIND',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00011',
<<<<<<< HEAD
            'id_jadwal' => 'JDWPAID',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6603',
<<<<<<< HEAD
            'id_jadwal' => 'JDWMEPA',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6203',
<<<<<<< HEAD
            'id_jadwal' => 'JDWOAKD',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00004',
<<<<<<< HEAD
            'id_jadwal' => 'JDWINDOD',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6402',
<<<<<<< HEAD
            'id_jadwal' => 'JDWJARKOMG',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00006',
<<<<<<< HEAD
            'id_jadwal' => 'JDWIOTD',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6201',
<<<<<<< HEAD
            'id_jadwal' => 'JDWMAT2',
            'id_TA' => $id_TA_Genap_2022,
=======
            'id_riwayat_TA' => $id_TA_Genap_2022,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6301',
<<<<<<< HEAD
            'id_jadwal' => 'JDWSTRUKDAT',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6306',
<<<<<<< HEAD
            'id_jadwal' => 'JDWSTATISD',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6303',
<<<<<<< HEAD
            'id_jadwal' => 'JDWBASDATD',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6302',
<<<<<<< HEAD
            'id_jadwal' => 'JDWSOD',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6304',
<<<<<<< HEAD
            'id_jadwal' => 'JDWMETNUM',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6506',
<<<<<<< HEAD
            'id_jadwal' =>'JDWKJID',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6305',
<<<<<<< HEAD
            'id_jadwal' => 'JDWIMKD',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00008',
<<<<<<< HEAD
            'id_jadwal' => 'JDWKWUD',
            'id_TA' => $id_TA_Ganjil_2023,
=======
            'id_riwayat_TA' => $id_TA_Ganjil_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6406',
<<<<<<< HEAD
            'id_jadwal' => 'JDWSISCERB',
            'id_TA' => $id_TA_Genap_2023,
=======
            'id_riwayat_TA' => $id_TA_Genap_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6404',
<<<<<<< HEAD
            'id_jadwal' => 'JDWGKVB',
            'id_TA' => $id_TA_Genap_2023,
=======
            'id_riwayat_TA' => $id_TA_Genap_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6401',
<<<<<<< HEAD
            'id_jadwal' => 'JDWPBOC',
            'id_TA' => $id_TA_Genap_2023,
=======
            'id_riwayat_TA' => $id_TA_Genap_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6403',
<<<<<<< HEAD
            'id_jadwal' => 'JDWMBDB',
            'id_TA' => $id_TA_Genap_2023,
=======
            'id_riwayat_TA' => $id_TA_Genap_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6405',
<<<<<<< HEAD
            'id_jadwal' => 'JDWRPLB',
            'id_TA' => $id_TA_Genap_2023,
=======
            'id_riwayat_TA' => $id_TA_Genap_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6601',
<<<<<<< HEAD
            'id_jadwal' => 'JDWASAD',
            'id_TA' => $id_TA_Genap_2023,
=======
            'id_riwayat_TA' => $id_TA_Genap_2023,'status' => 'Sudah Disetujui',
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
