<?php

namespace App\Http\Controllers\Mhs;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa; 
use App\Models\KHS; 
use App\Models\IRS;
use App\Models\MataKuliah;
use App\Models\SemesterAktif;

class DashboardMhsController extends Controller
{
    public function index(): View
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data mahasiswa berdasarkan email
        $mhs = Mahasiswa::where('email', $user->email)->first();
        
        // Menghitung IPK dan SKS
        $nim = $mhs->nim;
        
        // Ambil semua semester yang sudah selesai berdasarkan NIM
        $semesterAktif = SemesterAktif::where('nim', $nim)
            ->where('status', 'Aktif')
            ->where('is_active', 0) // Semester yang sudah selesai
            ->get();
        
        // Jika tidak ada semester ditemukan, kembalikan nilai IPK 0
        if ($semesterAktif->isEmpty()) {
            return view('content.mhs.dashboard', compact('user', 'mhs', 'ipk', 'sks'));
        }
        
        // Variabel untuk menghitung total SKS dan total bobot
        $totalSKS = 0;
        $totalBobot = 0;
        

        // Loop untuk menghitung total SKS dan total bobot untuk setiap semester
        foreach ($semesterAktif as $semester) {
            // Ambil IRS berdasarkan id_TA yang didapat dari semester aktif dan nim
            $irs = IRS::where('id_TA', $semester->id)
                ->where('nim', $nim)
                ->get();

            // Loop untuk menghitung total SKS dan total bobot untuk setiap IRS
            foreach ($irs as $ir) {
                // Ambil data KHS berdasarkan id_irs yang ada di IRS
                $khs = KHS::where('id_irs', $ir->id)->first();

                // Jika tidak ada data KHS, skip IRS ini
                if (!$khs) {
                    continue;
                }

                // Tentukan bobot berdasarkan nilai yang ada di KHS
                $bobot = 0;
                switch ($khs->nilai) {
                    case 'A': $bobot = 4.00; break;
                    case 'AB': $bobot = 3.50; break;
                    case 'B': $bobot = 3.00; break;
                    case 'BC': $bobot = 2.50; break;
                    case 'C': $bobot = 2.00; break;
                    case 'D': $bobot = 1.00; break;
                    case 'E': $bobot = 0.00; break;
                }

                // Ambil SKS mata kuliah yang diambil dari IRS
                $matakuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();

                // Jika mata kuliah tidak ditemukan, skip
                if (!$matakuliah) {
                    continue;
                }

                // Tambahkan SKS dan bobot * SKS ke total
                $totalSKS += $matakuliah->sks;
                $totalBobot += $matakuliah->sks * $bobot;
            }
        }

        // Menghitung IPK: (Total Bobot) / Total SKS
        $ipk = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;

        // Format IPK dengan 2 angka di belakang koma
        $ipk = number_format($ipk, 2);

        return view('content.mhs.dashboard', compact('user', 'mhs', 'ipk', 'totalSKS'));
    }

    public function akademik(): View
    {
        return view('content.mhs.akademik');
    }

    public function registrasi(): View
    {
        return view('content.mhs.registrasi');
    }

    public function show($nim)
    {
        $mhs = Mahasiswa::with('semester_aktif') // Mengambil relasi semester aktif
            ->where('nim', $nim)
            ->firstOrFail();

        return view('mahasiswa.show', compact('mhs'));
    }
}
