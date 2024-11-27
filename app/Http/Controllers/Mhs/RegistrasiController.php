<?php

namespace App\Http\Controllers\Mhs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;

class RegistrasiController extends Controller
{
    public function index()
    {
        // Ambil data mahasiswa melalui relasi dari User (auth user)
        $user = auth()->user(); // Data user yang sedang login
        $mahasiswa = $user->mahasiswa; // Relasi ke Mahasiswa

        // Pastikan mahasiswa ditemukan
        if (!$mahasiswa) {
            return redirect()->route('mhs.dashboard.index')
                ->with('error', 'Mahasiswa tidak ditemukan untuk email: ' . $user->email);
        }

        // Ambil data semester_aktif menggunakan relasi
        $semesterAktif = $mahasiswa->semester_aktif;

        return view('content.mhs.registrasi', compact('mahasiswa', 'semesterAktif'));
    }

    /**
     * Update status registrasi.
     */
    public function updateStatus(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|string|in:Aktif,Cuti', // Hanya menerima status Aktif atau Cuti
            'nim' => 'required|string|exists:mahasiswa,nim', // NIM harus valid dan ada di tabel mahasiswa
        ]);

        // Cari data semester aktif berdasarkan NIM
        $semesterAktif = SemesterAktif::where('nim', $validated['nim'])->first();

        if (!$semesterAktif) {
            // Jika data belum ada, buat entri baru
            $semesterAktif = SemesterAktif::create([
                'nim' => $validated['nim'],
                'tahun_akademik' => '2024/2025', // Tahun akademik aktif (disesuaikan)
                'semester' => 1, // Bisa diambil dari konfigurasi atau input
                'status' => $validated['status'],
            ]);
        } else {
            // Jika data sudah ada, update status
            $semesterAktif->status = $validated['status'];
            $semesterAktif->save();
        }

        return response()->json(['message' => 'Status berhasil diperbarui'], 200);
        }
}