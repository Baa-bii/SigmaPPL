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
        // Ambil id_TA dari semester aktif yang sedang berjalan
        $id_TA_Ganjil_2024 = DB::table('semester_aktif')
        ->where('tahun_akademik', '2024/2025 Ganjil') // Misalnya semester sekarang
        ->where('semester', 5)  // Semester yang sedang berjalan
        ->first()->id;
        
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

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6102',
            'id_jadwal' => 'JDWDASPROD',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6101',
            'id_jadwal' => 'JDWMAT1',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00007',
            'id_jadwal' => 'JDWINGGRISD',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6105',
            'id_jadwal' => 'JDWSTRUKDISD',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00005',
            'id_jadwal' => 'JDWORB',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6103',
            'id_jadwal' => 'JDWDASISD',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6104',
            'id_jadwal' => 'JDWLOGIFD',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00003',
            'id_jadwal' => 'JDWPKND',
            'id_TA' => $id_TA_Ganjil_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6202',
            'id_jadwal' =>'JDWALPROD',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6204',
            'id_jadwal' => 'JDWALIND',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00011',
            'id_jadwal' => 'JDWPAID',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6603',
            'id_jadwal' => 'JDWMEPA',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6203',
            'id_jadwal' => 'JDWOAKD',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00004',
            'id_jadwal' => 'JDWINDOD',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6402',
            'id_jadwal' => 'JDWJARKOMG',
            'id_TA' => $id_TA_Genap_2022,

            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00006',
            'id_jadwal' => 'JDWIOTD',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6201',
            'id_jadwal' => 'JDWMAT2',
            'id_TA' => $id_TA_Genap_2022,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6301',
            'id_jadwal' => 'JDWSTRUKDAT',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6306',
            'id_jadwal' => 'JDWSTATISD',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6303',
            'id_jadwal' => 'JDWBASDATD',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6302',
            'id_jadwal' => 'JDWSOD',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6304',
            'id_jadwal' => 'JDWMETNUM',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6506',
            'id_jadwal' =>'JDWKJID',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6305',
            'id_jadwal' => 'JDWIMKD',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'UUW00008',
            'id_jadwal' => 'JDWKWUD',
            'id_TA' => $id_TA_Ganjil_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6406',
            'id_jadwal' => 'JDWSISCERB',
            'id_TA' => $id_TA_Genap_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6404',
            'id_jadwal' => 'JDWGKVB',
            'id_TA' => $id_TA_Genap_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6401',
            'id_jadwal' => 'JDWPBOC',
            'id_TA' => $id_TA_Genap_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6403',
            'id_jadwal' => 'JDWMBDB',
            'id_TA' => $id_TA_Genap_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6405',
            'id_jadwal' => 'JDWRPLB',
            'id_TA' => $id_TA_Genap_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        IRS::create([
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6601',
            'id_jadwal' => 'JDWASAD',
            'id_TA' => $id_TA_Genap_2023,
            'status' => 'Sudah Disetujui',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        
        // Ambil semua mahasiswa
        $mahasiswaList = Mahasiswa::all();

        foreach ($mahasiswaList as $mahasiswa) {
            // Ambil semester aktif terkini (is_active = 1) untuk mahasiswa
            $currentSemesterAktif = SemesterAktif::where('nim', $mahasiswa->nim)
                ->where('is_active', 1)
                ->where('status', 'aktif')
                ->first();

            // Jika tidak ada semester aktif terkini, lewati mahasiswa ini
            if (!$currentSemesterAktif) {
                continue;
            }

            Log::info("Memproses mahasiswa aktif", [
                'nim' => $mahasiswa->nim,
                'semester' => $currentSemesterAktif->semester,
            ]);

            // Proses semester aktif terkini (is_active = 1)
            $mataKuliahList = Matakuliah::where('semester', $currentSemesterAktif->semester)->get();

            foreach ($mataKuliahList as $mataKuliah) {
                // Ambil jadwal berdasarkan kode_mk
                $jadwal = Jadwal::where('kode_mk', $mataKuliah->kode_mk)->first();

                // Periksa apakah data IRS sudah ada
                $exists = IRS::where('nim', $mahasiswa->nim)
                    ->where('kode_mk', $mataKuliah->kode_mk)
                    ->where('id_TA', $currentSemesterAktif->id)
                    ->exists();

                if (!$exists && $jadwal) {
                    // Buat data IRS dengan status "Belum Disetujui"
                    IRS::create([
                        'nim' => $mahasiswa->nim,
                        'kode_mk' => $mataKuliah->kode_mk,
                        'id_jadwal' => $jadwal->id_jadwal,
                        'id_TA' => $currentSemesterAktif->id,
                        'status' => 'belum disetujui',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    Log::info("IRS dibuat untuk mahasiswa", [
                        'nim' => $mahasiswa->nim,
                        'kode_mk' => $mataKuliah->kode_mk,
                        'id_TA' => $currentSemesterAktif->id,
                        'status' => 'belum disetujui',
                    ]);
                }
            }

            // Proses semester aktif sebelumnya (is_active = 0)
            $semesterAktifList = SemesterAktif::where('nim', $mahasiswa->nim)
                ->where('is_active', 0)
                ->where('semester', '<=', $currentSemesterAktif->semester)
                ->get();

            foreach ($semesterAktifList as $semesterAktif) {
                $mataKuliahList = Matakuliah::where('semester', $semesterAktif->semester)->get();

                foreach ($mataKuliahList as $mataKuliah) {
                    $jadwal = Jadwal::where('kode_mk', $mataKuliah->kode_mk)->first();

                    $exists = IRS::where('nim', $mahasiswa->nim)
                        ->where('kode_mk', $mataKuliah->kode_mk)
                        ->where('id_TA', $semesterAktif->id)
                        ->exists();

                    if (!$exists && $jadwal) {
                        IRS::create([
                            'nim' => $mahasiswa->nim,
                            'kode_mk' => $mataKuliah->kode_mk,
                            'id_jadwal' => $jadwal->id_jadwal,
                            'id_TA' => $semesterAktif->id,
                            'status' => 'sudah disetujui',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        Log::info("IRS dibuat untuk semester yang sudah berlalu", [
                            'nim' => $mahasiswa->nim,
                            'kode_mk' => $mataKuliah->kode_mk,
                            'id_TA' => $semesterAktif->id,
                            'status' => 'sudah disetujui',
                        ]);
                    }
                }
            }
        }    
    }
}
