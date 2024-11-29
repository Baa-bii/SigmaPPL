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

        // Mengambil parameter dari request
        $angkatan = $request->input('angkatan');
        $search = $request->input('search'); // Menambahkan input pencarian
        $perPage = $request->input('per_page', 10); // Menangani jumlah data per halaman (default 10)

        // Ambil mahasiswa berdasarkan nip_dosen dosen yang login, dengan pagination
        $mahasiswa = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)
            ->when($angkatan, function ($query, $angkatan) {
                return $query->where('angkatan', $angkatan);
            })
            ->when($search, function ($query, $search) {
                return $query->where('nama_mhs', 'like', '%' . $search . '%');
            })
            ->paginate($perPage); // Pagination sesuai dengan nilai per_page

        // Ambil angkatan unik
        $angkatanList = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)
            ->select('angkatan')
            ->distinct()
            ->pluck('angkatan');

        // Kirim data mahasiswa, angkatanList, dan angkatan ke view
        return view('content.dosen.perwalian', compact('mahasiswa', 'angkatanList', 'angkatan', 'perPage', 'search'));
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::with('programStudi')->where('nim', $nim)->firstOrFail();

        return view('content.dosen.detailmhs', compact('mahasiswa'));
    }
}
