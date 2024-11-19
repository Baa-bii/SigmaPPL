<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class PerwalianController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user(); // User yang login
        $dosen = $user->dosen; // Relasi ke dosen berdasarkan email

        if (!$dosen) {
            return redirect()->route('login')->with('error', 'Data dosen tidak ditemukan.');
        }

        $angkatan = $request->input('angkatan');

        // Ambil mahasiswa berdasarkan nip_dosen dosen yang login, dengan pagination
        $mahasiswa = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)
            ->when($angkatan, function ($query, $angkatan) {
                return $query->where('angkatan', $angkatan);
            })
            ->paginate(10); // Pagination 10 data per halaman

        // Ambil angkatan unik
        $angkatanList = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)
            ->select('angkatan')
            ->distinct()
            ->pluck('angkatan');

        return view('content.dosen.perwalian', compact('mahasiswa', 'angkatanList', 'angkatan'));
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::with('programStudi')->where('nim', $nim)->firstOrFail();

        return view('content.dosen.detailmhs', compact('mahasiswa'));
    }


}
