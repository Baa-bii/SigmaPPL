<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class CetakIrsController extends Controller
{
    public function cetakIRS($semesterId)
    {
        // Ambil data semester berdasarkan ID beserta relasi yang dibutuhkan
        $semesterAktifData = SemesterAktif::with('irs.matakuliah', 'irs.jadwal.ruang', 'irs.jadwal.waktu')->findOrFail($semesterId);

        // Ambil data mahasiswa berdasarkan NIM dari tabel SemesterAktif
        $mahasiswaData = Mahasiswa::where('nim', $semesterAktifData->nim)
            ->with('programStudi', 'dosen') // Relasi ke Program Studi dan Dosen
            ->firstOrFail();

        // Pisahkan tahun akademik menjadi dua bagian: tahun ajaran dan semester
        $tahunAjaran = $semesterAktifData->tahun_akademik; // Contoh: 2022/2023
        list($tahunMulai, $tahunAkhir) = explode('/', $tahunAjaran); // Pisahkan tahun ajaran
        $semester = $semesterAktifData->semester; // Ganjil atau Genap

        // Kirim data ke view untuk dicetak
        return view('content.dosen.cetakirs', compact('semesterAktifData', 'mahasiswaData', 'tahunMulai', 'tahunAkhir', 'semester'));
    }
}

