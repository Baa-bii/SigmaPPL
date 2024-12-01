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

    public function showJadwal()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;
    
        // Pastikan mahasiswa ada
        if (!$mahasiswa) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    
        // Ambil semester aktif mahasiswa
        $semesterAktif = $mahasiswa->semester_aktif()->where('is_active', true)->first();
        if (!$semesterAktif) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
        }
    
        // Ambil data IRS berdasarkan semester aktif mahasiswa
        $irs = Irs::where('nim', $mahasiswa->nim) // Filter berdasarkan nim mahasiswa
        ->where('id_TA', $semesterAktif->id) // Filter berdasarkan semester aktif (id_TA)
        ->get();
        // Ambil jadwal mata kuliah yang ada di IRS pada semester aktif
        $jadwals = Jadwal::with('waktu') // Menambahkan eager load untuk relasi 'waktu'
        ->whereIn('kode_mk', $irs->pluck('kode_mk'))
        ->where('id_TA', $semesterAktif->id)
        ->get();

        // Kelompokkan jadwal berdasarkan hari dan jam
        $jadwalGrouped = $jadwals->groupBy(function($jadwal) {
        return $jadwal->hari . '-' . str_pad($jadwal->waktu->jam_mulai, 2, '0', STR_PAD_LEFT) . ':00';
        });

        // Kirim data ke view
        dd($jadwalGrouped);
        return view('content.mhs.akademik', compact('jadwalGrouped', 'semesterAktif'));
    }
     // // Ambil jadwal mata kuliah yang ada di IRS pada semester aktif
        // $jadwalGrouped = Jadwal::whereIn('kode_mk', $irs->pluck('kode_mk')) // Ambil jadwal yang sesuai dengan kode mata kuliah di IRS
        // ->where('id_TA', $semesterAktif->id) // Pastikan hanya jadwal di semester aktif
        // ->get()
        // ->groupBy(function($jadwal) {
        //     return $jadwal->hari . '-' . str_pad($jadwal->waktu->jam_mulai, 2, '0', STR_PAD_LEFT) . ':00'; // Mengelompokkan jadwal berdasarkan hari dan jam
        // });
         // Tambahkan debug statement
    // // Ambil mata kuliah yang dipilih oleh mahasiswa pada semester aktif
        // $mataKuliahDipilih = Irs::where('nim', $mahasiswa->nim)
        //     ->where('id_TA', $semesterAktif->id)
        //     ->get()
        //     ->pluck('kode_mk');
    
        // Ambil jadwal berdasarkan mata kuliah yang dipilih pada semester aktif
        // $jadwalGrouped = Jadwal::whereIn('kode_mk', $mataKuliahDipilih)
        //     ->where('id_TA', $semesterAktif->id) // Filter berdasarkan tahun ajaran
        //     ->get()
        //     ->groupBy(function($jadwal) {
        //         return $jadwal->hari; // Mengelompokkan jadwal berdasarkan hari
        //     });

        // $jadwalGrouped = Jadwal::whereIn('kode_mk', $mataKuliahDipilih)
        // ->where('id_TA', $semesterAktif->id)
        // ->get()
        // ->groupBy(function($jadwal) {
        //     return $jadwal->hari . '-' . str_pad($jadwal->waktu->jam_mulai, 2, '0', STR_PAD_LEFT) . ':00'; // Menggabungkan hari dan jam
        // });
        // Ambil IRS yang sesuai dengan semester aktif

}

