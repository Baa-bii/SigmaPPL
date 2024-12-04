<?php

namespace App\Http\Controllers\Mhs;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\MataKuliah;
use App\Models\IRS;


class BuatIRSController extends Controller
{
    public function addDefaultMK(){
        $user = auth()->user();
        $mhs = $user->mahasiswa;

        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        
        // Ambil semester aktif yang sesuai dengan kondisi
        $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
        if (!$semesterAktif) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
        }
        $status = $semesterAktif?->status ?? 'Belum Registrasi';
        $semester = $semesterAktif?->semester ?? null;

        $mataKuliahDefault = MataKuliah::where('semester', $semester)->get();
        // Loop untuk menyimpan mata kuliah default yang sesuai dengan semester aktif
        foreach ($mataKuliahDefault as $mk) {
            Irs::updateOrCreate(
                [
                    'nim' => $mhs->nim,          // NIM mahasiswa
                    'kode_mk' => $mk->kode_mk,   // Kode mata kuliah
                    'id_TA' => $semesterAktif->id,  // ID semester aktif
                ],
                [
                    'status' => 'Belum Disetujui',  // Status awal mata kuliah
                    'status_mata_kuliah' => 'BARU' // Status mata kuliah (baru pertama kali)
                ]
            );
        }
    }
    public function index()
    {
        $user = auth()->user();
        $mhs = $user->mahasiswa;
        $this->addDefaultMK();

        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        // Ambil semester aktif yang sesuai dengan kondisi
        $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
        $status = $semesterAktif?->status ?? 'Belum Registrasi';
        $semester = $semesterAktif?->semester ?? null;

        // permatakuliahan
        $mataKuliah = MataKuliah::select('kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk')->get();
    
        $mataKuliahDitampilkan = Irs::where('nim', $mhs->nim)
            ->where('id_TA', SemesterAktif::where('is_active', true)->first()->id)
            ->get()
            ->map(function($irs) {
                return MataKuliah::where('kode_mk', $irs->kode_mk)->first();
        });

        $mataKuliahDipilih = Irs::where('nim', $mhs->nim)
            ->where('id_TA', SemesterAktif::where('status', 'aktif')->first()->id)
            ->get()
            ->map(function($irs) {
                return MataKuliah::where('kode_mk', $irs->kode_mk)->first();
            });
            // Mengambil jadwal melalui relasi Eloquent
            $jadwal = DB::table('irs')
            ->join('semester_aktif', 'irs.id_TA', '=', 'semester_aktif.id')
            ->join('jadwal', 'irs.kode_mk', '=', 'jadwal.kode_mk')
            ->join('waktu', 'jadwal.id_waktu', '=', 'waktu.id')
            ->join('matakuliah', 'jadwal.kode_mk', '=', 'matakuliah.kode_mk')
            ->select(
                DB::raw("UPPER(jadwal.hari) as hari"),
                DB::raw("TIME_FORMAT(waktu.jam_mulai, '%H:%i') as jam_mulai"),
                'jadwal.kode_mk',
                'jadwal.kelas',
                'matakuliah.nama_mk',
                'matakuliah.jenis_mk',
                'matakuliah.semester',
                'matakuliah.sks'
            )
            ->where('irs.nim', '=', $mhs->nim)
            ->where('semester_aktif.is_active', '=', 1)
            ->orderBy('jadwal.hari')
            ->orderBy('waktu.jam_mulai')
            ->get();


        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliah', 'mataKuliahDitampilkan', 'mataKuliahDipilih', 'jadwal'));
    }
    public function updateMK(Request $request)
    {
        $user = auth()->user();
        $mhs = $user->mahasiswa;

        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Ambil semester aktif
        $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
        if (!$semesterAktif) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
        }

        // Ambil data mata kuliah yang dipilih
        $mataKuliahDipilih = $request->input('mata_kuliah', []);

        // Hapus mata kuliah yang sebelumnya di-IRS
        Irs::where('nim', $mhs->nim)
            ->where('id_TA', $semesterAktif->id)
            ->delete();  // Hapus data yang lama

        // Simpan mata kuliah yang baru
        foreach ($mataKuliahDipilih as $kodeMk) {
            Irs::updateOrCreate(
                [
                    'nim' => $mhs->nim,
                    'kode_mk' => $kodeMk,
                    'id_TA' => $semesterAktif->id,
                ],
                [
                    'status' => 'Belum Disetujui',  // Status awal mata kuliah
                    'status_mata_kuliah' => 'BARU' // Status mata kuliah
                ]
            );
        }

        return redirect()->route('mhs.akademik.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }
    public function showJadwal()
{
    $user = auth()->user();
    $mhs = $user->mahasiswa;

    // Pastikan mahasiswa ditemukan
    if (!$mhs) {
        return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    // Ambil semester aktif
    $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();

    // Pastikan semester aktif ditemukan
    if (!$semesterAktif) {
        return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    }

     //     $jadwals = DB::select("
    //     SELECT 
    //         jadwal.kode_mk,
    //         jadwal.id_jadwal AS jadwal_id,
    //         jadwal.kelas,
    //         jadwal.hari,
    //         waktu.jam_mulai,
    //         matakuliah.nama_mk,
    //         matakuliah.jenis_mk,
    //         matakuliah.semester,
    //         matakuliah.sks
    //     FROM 
    //         irs
    //     JOIN 
    //         semester_aktif ON irs.id_TA = semester_aktif.id
    //     JOIN 
    //         jadwal ON irs.kode_mk = jadwal.kode_mk
    //     JOIN 
    //         waktu ON jadwal.id_waktu = waktu.id
    //     JOIN 
    //         matakuliah ON jadwal.kode_mk = matakuliah.kode_mk
    //     WHERE 
    //         irs.nim = ?
    //         AND semester_aktif.is_active = 1
    //     ORDER BY 
    //         jadwal.hari, waktu.jam_mulai
    // ", [$mhs->nim]);

    // Debugging: Pastikan jadwals terambil
    // Uncomment untuk debugging
    // dd($jadwals);

    // Pastikan data jadwal ditemukan
    if ($jadwals->isEmpty()) {
        return redirect()->route('mhs.dashboard.index')->with('error', 'Data jadwal tidak ditemukan.');
    }

    // Kembalikan ke view dengan data jadwals
    return view('content.mhs.akademik', compact('mhs', 'jadwals', 'semesterAktif'));
    }

}

   
    // public function showJadwal()
    // {
    //     $user = auth()->user();
    //     $mhs = $user->mahasiswa;

    //     // Pastikan mahasiswa ditemukan
    //     if (!$mhs) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    //     }

    //     $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
    //     // Pastikan semester aktif ditemukan
    //     if (!$semesterAktif) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    //     }

    //     $jadwals = Jadwal::with(['waktu', 'matakuliah'])
    //         ->whereHas('irs', function ($query) use ($mhs, $semesterAktif) {
    //             $query->where('nim', $mhs->nim)
    //                 ->where('id_TA', $semesterAktif->id);
    //         })
    //         ->orderBy('hari')
    //         ->orderBy('waktu.jam_mulai')
    //         ->get();
    // return view('content.mhs.akademik', compact('mhs', 'jadwals', 'semesterAktif'));
    // }

    // Menjalankan Query Builder yang sama dengan SQL yang berhasil
    // $jadwals = DB::table('irs')
    //     ->join('semester_aktif', 'irs.id_TA', '=', 'semester_aktif.id')
    //     ->join('jadwal', 'irs.kode_mk', '=', 'jadwal.kode_mk') // Join melalui kode_mk
    //     ->join('waktu', 'jadwal.id_waktu', '=', 'waktu.id')
    //     ->join('matakuliah', 'jadwal.kode_mk', '=', 'matakuliah.kode_mk')
    //     ->where('irs.nim', $mhs->nim)
    //     ->where('semester_aktif.is_active', 1)
    //     ->select(
    //         'jadwal.kode_mk',
    //         'jadwal.id_jadwal AS jadwal_id_jadwal',
    //         'jadwal.kelas',
    //         'jadwal.hari',
    //         'waktu.jam_mulai',
    //         'matakuliah.nama_mk',
    //         'matakuliah.jenis_mk',
    //         'matakuliah.semester',
    //         'matakuliah.sks'
    //     )
    //     ->orderBy('jadwal.hari')
    //     ->orderBy('waktu.jam_mulai')
    //     ->get();


        // // Pastikan data jadwal ditemukan
        // if ($jadwals->isEmpty()) {
        //     return redirect()->route('mhs.dashboard.index')->with('error', 'Data jadwal tidak ditemukan.');
        // }

        // // Mengorganisasi jadwal berdasarkan hari dan jam
        // $jadwalPerHari = [
        //     'Senin' => [],
        //     'Selasa' => [],
        //     'Rabu' => [],
        //     'Kamis' => [],
        //     'Jumat' => [],
        //     'Sabtu' => [],
        // ];

        // foreach ($jadwals as $jadwal) {
        //     $hari = $jadwal->hari;
        //     $jam = isset($jadwal->waktu) ? (int) $jadwal->waktu->jam_mulai : null;
    
        //     if ($jam !== null && isset($jadwalPerHari[$hari])) {
        //         $jadwalPerHari[$hari][$jam][] = $jadwal;
        //     }
        // }
        // foreach ($jadwals as $jadwal) {
        //     $hari = $jadwal->hari;
        //     $jam = (int) $jadwal->waktu->jam_mulai;
    
        //     if (isset($jadwalPerHari[$hari])) {
        //         $jadwalPerHari[$hari][$jam][] = $jadwal;
        //     }
        // foreach ($jadwals as $jadwal) {
        //     // Normalisasi nama hari untuk memastikan konsistensi
        //     $hari = ucfirst(strtolower($jadwal->hari));
        //     $jam = (int) $jadwal->waktu->jam_mulai;
    
        //     if (isset($jadwalPerHari[$hari])) {
        //         $jadwalPerHari[$hari][$jam][] = $jadwal;
    //     //     }
        
    //     // }
    //     // dd($jadwalPerHari);

    //     // Kembalikan ke view dengan data yang sudah diproses
    //     return view('content.mhs.akademik', compact('mhs', 'jadwals', 'semesterAktif'));
    // }
//     public function showJadwal(Request $request)
// {
//     // Fetch all available data for the dropdowns or filters
//     $semesters = Semester::all(); // Assuming this is for semester dropdown
//     $matakuliahList = MataKuliah::all(); // Assuming you need a MataKuliah list for filtering
    
//     // Start building the query for Jadwal
//     $query = Jadwal::query();

//     // Apply filter for active semester and NIM
//     if ($request->has('nim') && $request->nim != '') {
//         $query->whereHas('irs', function ($query) use ($request) {
//             $query->where('nim', $request->nim);
//         });
//     }

//     if ($request->has('semester_id') && $request->semester_id != '') {
//         $query->whereHas('irs', function ($query) use ($request) {
//             $query->where('id_TA', $request->semester_id);
//         });
//     }

//     // Fetch the filtered or full data with relationships
//     $jadwals = $query->with(['waktu', 'matakuliah'])
//         ->orderBy('hari')
//         ->orderBy('waktu.jam_mulai')
//         ->get();

//     // Return the view with filtered data
//     return view('content.mhs.akademik', compact('jadwals', 'semesters', 'matakuliahList'));
// }


// Ambil semua jadwal berdasarkan id_jadwal yang terkait dengan mahasiswa dan semester aktif
        // $jadwals = Jadwal::with(['waktu', 'matakuliah'])
        // ->join('irs', 'irs.id_jadwal', '=', 'jadwal.id_jadwal') // Ubah join berdasarkan id_jadwal
        // ->join('semester_aktif', 'semester_aktif.id', '=', 'irs.id_TA')
        // ->join('waktu', 'waktu.id', '=', 'jadwal.id_waktu') // Pastikan join ke tabel waktu
        // ->where('irs.nim', $mhs->nim)
        // ->where('semester_aktif.is_active', true)
        // ->select('jadwal.*') // Pilih kolom dari jadwal
        // ->orderBy('jadwal.hari')
        // ->orderBy('waktu.jam_mulai')
        // ->get();
        // Mengambil jadwal melalui relasi dengan Eloquent
        // Menjalankan Raw SQL Query
    //     $jadwals = DB::select("
    //     SELECT 
    //         jadwal.kode_mk,
    //         jadwal.id_jadwal AS jadwal_id,
    //         jadwal.kelas,
    //         jadwal.hari,
    //         waktu.jam_mulai,
    //         matakuliah.nama_mk,
    //         matakuliah.jenis_mk,
    //         matakuliah.semester,
    //         matakuliah.sks
    //     FROM 
    //         irs
    //     JOIN 
    //         semester_aktif ON irs.id_TA = semester_aktif.id
    //     JOIN 
    //         jadwal ON irs.kode_mk = jadwal.kode_mk
    //     JOIN 
    //         waktu ON jadwal.id_waktu = waktu.id
    //     JOIN 
    //         matakuliah ON jadwal.kode_mk = matakuliah.kode_mk
    //     WHERE 
    //         irs.nim = ?
    //         AND semester_aktif.is_active = 1
    //     ORDER BY 
    //         jadwal.hari, waktu.jam_mulai
    // ", [$mhs->nim]);
    // Mengambil jadwal melalui relasi Eloquent
 // Query untuk mengambil jadwal berdasarkan data IRS dan semester aktif
        // $jadwals = DB::table('irs')
        //     ->join('jadwal', 'irs.kode_mk', '=', 'jadwal.kode_mk')
        //     ->join('waktu', 'jadwal.id_waktu', '=', 'waktu.id')
        //     ->join('matakuliah', 'jadwal.kode_mk', '=', 'matakuliah.kode_mk')
        //     // Gunakan kolom yang benar di semester_aktif untuk relasi
        //     ->where('irs.nim', $mhs->nim)
        //     ->where('irs.id_TA', $semesterAktif->id) // Ganti dengan id dari semester_aktif
        //     ->select(
        //         'jadwal.kode_mk',
        //         'jadwal.id_jadwal AS jadwal_id',
        //         'jadwal.kode_mk AS jadwal_kode_mk',
        //         'jadwal.kelas',
        //         'jadwal.hari',
        //         'waktu.jam_mulai',
        //         'matakuliah.nama_mk',
        //         'matakuliah.jenis_mk',
        //         'matakuliah.semester',
        //         'matakuliah.sks'
        //     )
        //     ->orderBy('jadwal.hari')
        //     ->orderBy('waktu.jam_mulai')
        //     ->get();
