<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\IRS;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;

class IRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //Ambil id_TA dari semester aktif yang sedang berjalan
        // $id_TA_Ganjil_2024 = DB::table('semester_aktif')
        // ->where('tahun_akademik', '2024/2025 Ganjil') // Misalnya semester sekarang
        // ->where('semester', 5)  // Semester yang sedang berjalan
        // ->first()->id;
        
        // // Ambil id_TA dari semester_aktif yang relevan
        //   $id_TA_Ganjil_2022 = DB::table('semester_aktif')
        //   ->where('tahun_akademik', '2022/2023 Ganjil')
        //   ->where('semester', 1)
        //   ->first()->id; // Ambil id semester aktif

        //    // Ambil id_TA dari semester_aktif yang relevan
        //    $id_TA_Genap_2022 = DB::table('semester_aktif')
        //    ->where('tahun_akademik', '2022/2023 Genap')
        //    ->where('semester', 2)
        //    ->first()->id; // Ambil id semester aktif

        //     // Ambil id_TA dari semester_aktif yang relevan
        //   $id_TA_Ganjil_2023 = DB::table('semester_aktif')
        //   ->where('tahun_akademik', '2023/2024 Ganjil')
        //   ->where('semester', 3)
        //   ->first()->id; // Ambil id semester aktif

        //    // Ambil id_TA dari semester_aktif yang relevan
        //    $id_TA_Genap_2023 = DB::table('semester_aktif')
        //    ->where('tahun_akademik', '2023/2024 Genap')
        //    ->where('semester', 4)
        //    ->first()->id; // Ambil id semester aktif

        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6102',
        //     'id_jadwal' => 'JDWDASPROD',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6101',
        //     'id_jadwal' => 'JDWMAT1',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00007',
        //     'id_jadwal' => 'JDWINGGRISD',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6105',
        //     'id_jadwal' => 'JDWSTRUKDISD',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00005',
        //     'id_jadwal' => 'JDWORB',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6103',
        //     'id_jadwal' => 'JDWDASISD',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6104',
        //     'id_jadwal' => 'JDWLOGIFD',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00003',
        //     'id_jadwal' => 'JDWPKND',
        //     'id_TA' => $id_TA_Ganjil_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6202',
        //     'id_jadwal' =>'JDWALPROD',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6204',
        //     'id_jadwal' => 'JDWALIND',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00011',
        //     'id_jadwal' => 'JDWPAID',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6603',
        //     'id_jadwal' => 'JDWMEPA',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6203',
        //     'id_jadwal' => 'JDWOAKD',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00004',
        //     'id_jadwal' => 'JDWINDOD',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6402',
        //     'id_jadwal' => 'JDWJARKOMG',
        //     'id_TA' => $id_TA_Genap_2022,

        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00006',
        //     'id_jadwal' => 'JDWIOTD',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6201',
        //     'id_jadwal' => 'JDWMAT2',
        //     'id_TA' => $id_TA_Genap_2022,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6301',
        //     'id_jadwal' => 'JDWSTRUKDAT',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6306',
        //     'id_jadwal' => 'JDWSTATISD',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6303',
        //     'id_jadwal' => 'JDWBASDATD',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6302',
        //     'id_jadwal' => 'JDWSOD',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6304',
        //     'id_jadwal' => 'JDWMETNUM',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6506',
        //     'id_jadwal' =>'JDWKJID',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6305',
        //     'id_jadwal' => 'JDWIMKD',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'UUW00008',
        //     'id_jadwal' => 'JDWKWUD',
        //     'id_TA' => $id_TA_Ganjil_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6406',
        //     'id_jadwal' => 'JDWSISCERB',
        //     'id_TA' => $id_TA_Genap_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6404',
        //     'id_jadwal' => 'JDWGKVB',
        //     'id_TA' => $id_TA_Genap_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6401',
        //     'id_jadwal' => 'JDWPBOC',
        //     'id_TA' => $id_TA_Genap_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6403',
        //     'id_jadwal' => 'JDWMBDB',
        //     'id_TA' => $id_TA_Genap_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6405',
        //     'id_jadwal' => 'JDWRPLB',
        //     'id_TA' => $id_TA_Genap_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // IRS::create([
        //     'nim' => '24060122140999',
        //     'kode_mk' => 'PAIK6601',
        //     'id_jadwal' => 'JDWASAD',
        //     'id_TA' => $id_TA_Genap_2023,
        //     'status' => 'Sudah Disetujui',
        //     'created_at' => now(),
        //     'updated_at' => now(),

        // ]);
        
        // Ambil semua mahasiswa kecuali yang sudah memiliki data IRS
        $mahasiswaList = Mahasiswa::whereNotIn('nim', function ($query) {
            $query->select('nim')
                ->from('irs'); // Ambil NIM yang sudah ada di tabel IRS
        })->get();

        foreach ($mahasiswaList as $mahasiswa) {
            // Ambil semester aktif dengan is_active = 1
            $currentSemesterAktif = SemesterAktif::where('nim', $mahasiswa->nim)
                ->where('is_active', 1)
                ->first();

            // Log jika mahasiswa tidak memiliki semester aktif
            if (!$currentSemesterAktif) {
                Log::warning("Mahasiswa tidak memiliki semester aktif", ['nim' => $mahasiswa->nim]);
                continue;
            }

            // Tangani status mahasiswa pada semester aktif
            if ($currentSemesterAktif->status === 'aktif') {
                Log::info("Mahasiswa dengan is_active = 1 dan status = aktif diproses", [
                    'nim' => $mahasiswa->nim,
                    'id_TA' => $currentSemesterAktif->id,
                ]);

                // Panggil fungsi untuk membuat IRS dengan status 'belum disetujui'
                $this->prosesIRS($mahasiswa, $currentSemesterAktif, 'belum disetujui');
            } else {
                Log::info("Mahasiswa dengan is_active = 1 memiliki status {$currentSemesterAktif->status}, IRS tidak dibuat untuk semester aktif", [
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Proses IRS untuk semester sebelumnya (is_active = 0)
            $previousSemesters = SemesterAktif::where('nim', $mahasiswa->nim)
                ->where('is_active', 0)
                ->where('semester', '<=', $currentSemesterAktif->semester)
                ->get();

            foreach ($previousSemesters as $semester) {
                Log::info("Memproses IRS untuk semester sebelumnya", [
                    'nim' => $mahasiswa->nim,
                    'id_TA' => $semester->id,
                ]);

                $this->prosesIRS($mahasiswa, $semester, 'sudah disetujui');
            }
        }
    }

    /**
     * Proses IRS untuk mahasiswa pada semester tertentu.
     */
    private function prosesIRS($mahasiswa, $semester, $status)
    {
        Log::info("Memulai proses IRS", [
            'nim' => $mahasiswa->nim,
            'id_TA' => $semester->id,
            'status' => $status,
        ]);

        // Ambil semua mata kuliah sesuai semester
        $mataKuliahList = Matakuliah::where('semester', $semester->semester)->get();

        foreach ($mataKuliahList as $mataKuliah) {
            // Cari jadwal yang sesuai dengan kode_mk
            $jadwal = Jadwal::where('kode_mk', $mataKuliah->kode_mk)->first();

            if (!$jadwal) {
                Log::warning("Tidak ditemukan jadwal untuk kode_mk", [
                    'kode_mk' => $mataKuliah->kode_mk,
                    'nim' => $mahasiswa->nim,
                ]);
                continue;
            }

            // Periksa apakah data IRS sudah ada
            $exists = IRS::where('nim', $mahasiswa->nim)
                ->where('kode_mk', $mataKuliah->kode_mk)
                ->where('id_TA', $semester->id)
                ->exists();

            if (!$exists) {
                // Buat data IRS baru
                IRS::create([
                    'nim' => $mahasiswa->nim,
                    'kode_mk' => $mataKuliah->kode_mk,
                    'id_jadwal' => $jadwal->id_jadwal,
                    'id_TA' => $semester->id,
                    'status' => $status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Log::info("IRS berhasil dibuat", [
                    'nim' => $mahasiswa->nim,
                    'kode_mk' => $mataKuliah->kode_mk,
                    'id_TA' => $semester->id,
                    'status' => $status,
                ]);
            } else {
                Log::info("IRS sudah ada, tidak ditambahkan lagi", [
                    'nim' => $mahasiswa->nim,
                    'kode_mk' => $mataKuliah->kode_mk,
                    'id_TA' => $semester->id,
                ]);
            }
        }
    }
}