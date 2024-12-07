<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;

class DashboardDosenController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        // Ambil statistik dari PerwalianController
        $statistics = app(PerwalianController::class)->getStatistics()->getData();

        $statusCounts = $statistics->success ? $statistics->data : [
            'Belum Registrasi' => 0,
            'Cuti' => 0,
            'Aktif' => 0,
            'Belum Isi IRS' => 0,
            'Sudah Isi IRS' => 0,
            'Belum Disetujui' => 0,
            'Sudah Disetujui' => 0,
        ];

        // Hitung total mahasiswa perwalian untuk dosen yang login
        $totalMahasiswa = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)->count();

        return view('content.dosen.dashboard', compact('user', 'dosen', 'statusCounts', 'totalMahasiswa'));
    }

    public function akademik(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        return view('content.dosen.akademik', compact('user', 'dosen'));
    }

    public function irs(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        return view('content.dosen.isi.irs', compact('user', 'dosen'));
    }

    public function perwalian(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        return view('content.dosen.perwalian', compact('user', 'dosen'));
    }
}
