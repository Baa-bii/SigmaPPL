<?php

namespace App\Http\Controllers\Mhs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;

class BuatIRSController extends Controller
{
    public function index()
    {
        // Ambil data mahasiswa melalui relasi dari User (auth user)
        $user = auth()->user(); // Data user yang sedang login
        $mhs = $user->mahasiswa; // Relasi ke Mahasiswa

        

        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $status = $mhs->semester_aktif->status ?? 'Belum Registrasi'; // Ambil status mahasiswa, default 'Belum Registrasi'

        return view('content.mhs.akademik', compact('mhs', 'status')); // Kirim $status ke view
    }


}
