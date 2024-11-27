<?php

namespace App\Http\Controllers\Mhs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\RuangKelas;


class BuatIRSController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mhs = $user->mahasiswa;

        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $status = $mhs->semester_aktif->status ?? 'Belum Registrasi';
        $semester = $mhs->semester_aktif->semester ?? null;

        // Semua mata kuliah untuk dropdown
        $mataKuliahDropdown = \App\Models\MataKuliah::orderBy('semester', 'asc')->get();


        // Mata kuliah hanya untuk semester aktif mahasiswa
        $mataKuliahDitampilkan = [];
        if ($semester) {
            $mataKuliahDitampilkan = \App\Models\MataKuliah::where('semester', $semester)
                ->orderBy('jenis_mk', 'asc') // Wajib lebih dulu
                ->get();
        }


        // Ambil jadwal untuk mata kuliah dengan banyak kelas
        $jadwal = Jadwal::with('matakuliah')
            ->whereHas('matakuliah', function ($query) use ($semester) {
                $query->where('semester', $semester);
            })
            ->get()
            ->groupBy('kode_mk')
            ->filter(function ($kelasJadwal) {
                return $kelasJadwal->count() > 1;
            });

        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliahDropdown', 'mataKuliahDitampilkan', 'jadwal'));
    }

}
