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

        // Cari data semester aktif berdasarkan NIM dan atribut 'is_active'
        $semesterAktif = SemesterAktif::where('nim', $validated['nim'])->where('is_active', true)->first();
        
        if (!$semesterAktif) {
            // Jika data belum ada, buat entri baru
            $semesterAktif = SemesterAktif::create([
                'nim' => $validated['nim'],
                'tahun_akademik' => $this->getTahunAkademik(), // Ambil tahun akademik dari helper atau konfigurasi
                'semester' => $this->getCurrentSemester(), // Ambil semester aktif dari helper atau logika
                'status' => $validated['status'],
                'is_active' => true,
            ]);
        } else {
            // Jika data sudah ada, update status
            $semesterAktif->update(['status' => $validated['status']]);
        }
        
        return redirect()->route('mhs.registrasi.index')->with('message', 'Status berhasil diperbarui');
        }
}