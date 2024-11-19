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
        // Ambil filter angkatan jika ada
        $angkatan = $request->input('angkatan');

        // Fetch data mahasiswa berdasarkan filter
        $mahasiswa = Mahasiswa::when($angkatan, function ($query, $angkatan) {
            return $query->where('angkatan', $angkatan);
        })->get();

        // Tampilkan halaman dengan data
        return view('content.dosen.perwalian', compact('mahasiswa', 'angkatan'));
    }
}
