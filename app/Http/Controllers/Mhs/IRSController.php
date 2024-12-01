<?php

namespace App\Http\Controllers\mhs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\MataKuliah;

class IRSController extends Controller
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

        // bagian matkul matkul
        $mataKuliah = MataKuliah::select('kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk')
        ->where('kode_mk', '!=', '0')  // Pastikan kode_mk tidak 0
        ->get();
    
        // Mata kuliah hanya untuk semester aktif mahasiswa
        $mataKuliahDitampilkan = MataKuliah::where('semester', $semester)->orderBy('jenis_mk', 'asc')->get();

        $jadwal = Jadwal::with(['matakuliah', 'waktu'])
            ->whereHas('matakuliah', function ($query) use ($semester) {
                $query->where('semester', $semester);
            })
            ->get()
            ->groupBy(['waktu.jam_mulai', 'hari']); // Kelompokkan berdasarkan jam dan hari
        // return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliahDropdown', 'mataKuliahDitampilkan', 'jadwal'));
        //dd($mataKuliah);
        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliah', 'mataKuliahDitampilkan', 'jadwal'));

    }
}
