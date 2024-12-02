<?php

namespace App\Http\Controllers\Mhs;

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

        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliah', 'mataKuliahDitampilkan', 'mataKuliahDipilih'));
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
    // public function showJadwal()
    // {
    //     $user = auth()->user();
    //     $mahasiswa = $user->mahasiswa;

    //     // Ambil semester aktif mahasiswa
    //     $semesterAktif = $mahasiswa->semester_aktif()->where('is_active', true)->first();
    //     if (!$semesterAktif) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    //     }

    //     // Ambil daftar IRS untuk semester aktif mahasiswa
    //     $irs = Irs::where('id_TA', $semesterAktif->id)->get();

    //     // Ambil jadwal sesuai dengan kode mata kuliah yang ada di IRS
    //     $jadwals = Jadwal::whereIn('kode_mk', $irs->pluck('kode_mk'))
    //                     ->where('id_TA', $semesterAktif->id)
    //                     ->get();
        
    //     dd($jadwals); // Menampilkan data jadwals

    //     // Kirim data jadwals ke view
    //     return view('mhs.akademik.index', compact('jadwals', 'semesterAktif'));
    // }

    // public function showJadwal($nim)
    // {
    //     $user = auth()->user();
    //     $mahasiswa = $user->mahasiswa;
    
    //     // Pastikan mahasiswa ada
    //     if (!$mahasiswa) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    //     }
    //     // Ambil data mahasiswa berdasarkan NIM
    //     $mahasiswa = Mahasiswa::where('nim', $nim)->first();
    
    //     // Ambil semester aktif mahasiswa
    //     $semesterAktif = $mahasiswa->semester_aktif()->where('is_active', true)->first();
    //     if (!$semesterAktif) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    //     }
    
    //    // Ambil data IRS berdasarkan semester aktif mahasiswa
    //     $irs = Irs::where('nim', $mahasiswa->nim) // Filter berdasarkan nim mahasiswa
    //     ->where('id_TA', $semesterAktif->id) // Filter berdasarkan semester aktif (id_TA)
    //     ->where('status', 'active') // Pastikan status IRS adalah 'active'
    //     ->get();
   
        
    //     // Ambil jadwal mata kuliah yang ada di IRS pada semester aktif
    //     $jadwals = Jadwal::with('waktu') // Menambahkan eager load untuk relasi 'waktu'
    //     ->whereIn('kode_mk', $irs->pluck('kode_mk')) // Ambil jadwal berdasarkan kode mata kuliah dari IRS
    //     ->where('id_TA', $semesterAktif->id) // Pastikan jadwal pada semester aktif
    //     ->get();
       

    //     // // Kelompokkan jadwal berdasarkan hari dan jam
    //     // $jadwalGrouped = $jadwals->groupBy(function ($jadwal) {
    //     //     return $jadwal->hari . '-' . str_pad($jadwal->waktu->jam_mulai, 2, '0', STR_PAD_LEFT) . ':00';
    //     // });
    //     // Organisasi jadwal per hari dan jam
    //     $jadwalPerHari = $this->organizeJadwalByDay($jadwals);
    
    //     return view('content.mhs.akademik', compact('mahasiswa', 'jadwalPerHari', 'semesterAktif'));
    // }
    // private function organizeJadwalByTime($jadwals)
    // {
    //     $jadwalPerHari = [
    //         'Senin' => [],
    //         'Selasa' => [],
    //         'Rabu' => [],
    //         'Kamis' => [],
    //         'Jumat' => [],
    //         'Sabtu' => [],
    //     ];
    //     // Organisasi jadwal berdasarkan hari dan jam
    // foreach ($jadwals as $jadwal) {
    //     $hari = $jadwal->waktu->hari;  // Hari dalam jadwal
    //     $jam = $jadwal->waktu->jam;    // Jam dalam jadwal

    //     // Menambahkan jadwal ke dalam array sesuai hari dan jam
    //     $jadwalPerHari[$hari][$jam][] = $jadwal;
    // }

    // return $jadwalPerHari;
    // }
    public function showJadwal($nim)
{
    // Ambil data mahasiswa berdasarkan NIM
    $mhs = Mahasiswa::where('nim', $nim)->first();

    // Pastikan mahasiswa ditemukan
    if (!$mhs) {
        return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    // Ambil semester aktif berdasarkan id_TA yang ada di model Mahasiswa
    $semesterAktif = SemesterAktif::where('is_active', 1)
        ->where('id', $mhs->semester_aktif_id) // Pastikan semester_aktif_id ada di model Mahasiswa
        ->first();

    // Pastikan semester aktif ditemukan
    if (!$semesterAktif) {
        return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    }

    // Query untuk mengambil jadwal berdasarkan data IRS dan semester aktif
    $jadwals = DB::table('irs')
        ->join('semester_aktif', 'irs.id_TA', '=', 'semester_aktif.id')
        ->join('jadwal', 'irs.kode_mk', '=', 'jadwal.kode_mk')
        ->join('waktu', 'jadwal.id_waktu', '=', 'waktu.id')
        ->join('matakuliah', 'jadwal.kode_mk', '=', 'matakuliah.kode_mk')
        ->select(
            'jadwal.kode_mk',
            'jadwal.id_jadwal AS jadwal_id',
            'jadwal.kode_mk AS jadwal_kode_mk',
            'jadwal.kelas',
            'jadwal.hari',
            'waktu.jam_mulai',
            'matakuliah.nama_mk',
            'matakuliah.jenis_mk',
            'matakuliah.semester',
            'matakuliah.sks'
        )
        ->where('irs.nim', $nim)  // Pastikan NIM sesuai
        ->where('semester_aktif.is_active', 1)  // Pastikan semester aktif
        ->orderBy('jadwal.hari')
        ->orderBy('waktu.jam_mulai')
        ->get();

    // Pastikan data jadwal ditemukan
    if ($jadwals->isEmpty()) {
        return redirect()->route('mhs.dashboard.index')->with('error', 'Data jadwal tidak ditemukan.');
    }

    // Mengorganisasi jadwal berdasarkan hari dan jam
    $jadwalPerHari = [
        'Senin' => [],
        'Selasa' => [],
        'Rabu' => [],
        'Kamis' => [],
        'Jumat' => [],
        'Sabtu' => [],
    ];

    // Organisasi jadwal berdasarkan hari dan jam
    foreach ($jadwals as $jadwal) {
        $hari = $jadwal->hari; // Hari dalam jadwal
        $jam = (int) $jadwal->jam_mulai; // Ubah menjadi integer

        // Pastikan hari dan jam sesuai dengan data yang ada
        if (isset($jadwalPerHari[$hari])) {
            // Menambahkan jadwal ke dalam array sesuai hari dan jam
            $jadwalPerHari[$hari][$jam][] = $jadwal;
        }
    }

    // Kembalikan ke view dengan data yang sudah diproses
    return view('content.mhs.akademik', compact('mhs', 'jadwalPerHari', 'semesterAktif'));
}

    
    
    
    // public function showJadwal($nim)
    // {
    //     $user = auth()->user();
        
    //     // Ambil data mahasiswa berdasarkan NIM
    //     $mhs = Mahasiswa::where('nim', $nim)->first();
    
    //     // Pastikan mahasiswa ditemukan
    //     if (!$mhs) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    //     }
    
    //     // Ambil semester aktif berdasarkan id_TA di tabel semester_aktif
    //     $semesterAktif = SemesterAktif::where('is_active', 1)
    //         ->where('id', $mhs->semester_aktif_id) // Pastikan ini ada di model Mahasiswa
    //         ->first();
    
    //     // Pastikan semester aktif ditemukan
    //     if (!$semesterAktif) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    //     }
    
    //     // Ambil data IRS berdasarkan NIM dan id_TA
    //     $irs = Irs::where('nim', $nim)
    //         ->where('id_TA', $semesterAktif->id)
    //         ->get();
    
    //     // Pastikan data IRS ditemukan
    //     if ($irs->isEmpty()) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Data IRS tidak ditemukan.');
    //     }
    
    //     // Query untuk mengambil jadwal berdasarkan data IRS dan semester aktif
    //     $jadwals = DB::table('irs')
    //         ->join('semester_aktif', 'irs.id_TA', '=', 'semester_aktif.id')
    //         ->join('jadwal', 'irs.kode_mk', '=', 'jadwal.kode_mk')
    //         ->join('waktu', 'jadwal.id_waktu', '=', 'waktu.id')
    //         ->join('matakuliah', 'jadwal.kode_mk', '=', 'matakuliah.kode_mk')
    //         ->select(
    //             'jadwal.kelas',
    //             'jadwal.hari',
    //             'waktu.jam_mulai',
    //             'matakuliah.nama_mk',
    //             'matakuliah.jenis_mk',
    //             'matakuliah.semester',
    //             'matakuliah.sks'
    //         )
    //         ->where('irs.nim', $mhs->nim)
    //         ->where('semester_aktif.is_active', 1) // Pastikan semester aktif
    //         ->orderBy('jadwal.hari')
    //         ->orderBy('waktu.jam_mulai')
    //         ->get();
    
    //     // Debugging untuk melihat data jadwal
    //     dd($jadwals);
    
    //     // Organisasi jadwal per hari dan jam
    //     $jadwalPerHari = $this->organizeJadwalByTime($jadwals);
    
    //     // Debugging untuk melihat hasil organisasi jadwal
    //     dd($jadwalPerHari);
    
    //     // Kembalikan ke view dengan data yang sudah diproses
    //     return view('content.mhs.akademik', compact('mhs', 'jadwalPerHari', 'semesterAktif'));
    // }
    
    // private function organizeJadwalByTime($jadwals)
    // {
    //     $jadwalPerHari = [
    //         'Senin' => [],
    //         'Selasa' => [],
    //         'Rabu' => [],
    //         'Kamis' => [],
    //         'Jumat' => [],
    //         'Sabtu' => [],
    //     ];
    
    //     // Mengorganisasi jadwal berdasarkan hari dan jam
    //     foreach ($jadwals as $jadwal) {
    //         $hari = $jadwal->hari; // Hari dalam jadwal
    //         $jam = (int) $jadwal->jam_mulai; // Ubah menjadi integer
    
    //         // Pastikan hari dan jam sesuai dengan data yang ada
    //         if (isset($jadwalPerHari[$hari])) {
    //             // Menambahkan jadwal ke dalam array sesuai hari dan jam
    //             $jadwalPerHari[$hari][$jam][] = $jadwal;
    //         }
    //     }
    
    //     return $jadwalPerHari;
    // }
    


}

