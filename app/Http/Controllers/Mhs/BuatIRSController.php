<?php

namespace App\Http\Controllers\Mhs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\MataKuliah;


class BuatIRSController extends Controller
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

        $mataKuliah = MataKuliah::select('kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk')->get();
        //dd($mataKuliah); // Ini akan menampilkan seluruh data yang diambil

        $mataKuliahDitampilkan = MataKuliah::where('semester', $semester)->orderBy('jenis_mk', 'asc')->get();

        //dd($mataKuliahDitampilkan);

        $jadwal = Jadwal::with(['matakuliah', 'waktu'])
            ->whereHas('matakuliah', function ($query) use ($semester) {
                $query->where('semester', $semester);
            })
            ->get()
            ->groupBy(['waktu.jam_mulai', 'hari']); // Kelompokkan berdasarkan jam dan hari

        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliah', 'mataKuliahDitampilkan', 'jadwal'));
    }
    public function updateMataKuliah(Request $request)
    {
        // Ambil data yang dikirimkan dari frontend
        $selectedCourses = $request->input('courses');
        $nim = $request->input('nim'); // Pastikan NIM ada dalam request

        // Mendapatkan ID Semester Aktif (bisa Anda sesuaikan dengan logika yang ada)
        $id_TA = SemesterAktif::where('status', 'aktif')->first()->id; 

        foreach ($selectedCourses as $kode_mk) {
            // Cek apakah mata kuliah sudah ada dalam IRS untuk mahasiswa yang sama pada semester ini
            $irs = Irs::updateOrCreate(
                [
                    'nim' => $nim,
                    'kode_mk' => $kode_mk,
                    'id_TA' => $id_TA,
                ],
                [
                    'status' => 'Belum Disetujui',
                    'status_mata_kuliah' => 'BARU',
                ]
            );
        }

        return response()->json(['message' => 'Mata kuliah diperbarui']);
    }

    // public function updateMataKuliah(Request $request)
    // {
    //     $user = auth()->user();
    //     $mhs = $user->mahasiswa;

    //     if (!$mhs) {
    //         return response()->json(['error' => 'Data mahasiswa tidak ditemukan.'], 400);
    //     }

    //     // Ambil mata kuliah yang dipilih dari request
    //     $selectedCourses = $request->courses;

    //     // Update atau simpan mata kuliah yang ditampilkan untuk mahasiswa
    //     // Menggunakan metode attach atau sync
    //     foreach ($selectedCourses as $kodeMk) {
    //         Irs::updateOrCreate(
    //             [
    //                 'nim' => $mhs->nim,
    //                 'kode_mk' => $kodeMk,
    //                 'id_TA' => $mhs->semester_aktif->id,  // ID semester aktif
    //             ],
    //             [
    //                 'status' => 'Belum Disetujui',  // Default status
    //                 'status_mata_kuliah' => 'BARU',
    //             ]
    //         );
    //     }

    //     // Ambil semua mata kuliah yang ditampilkan untuk mahasiswa setelah update
    //     $mataKuliahDitampilkan = $mhs->mataKuliahDitampilkan;

    //     // Render HTML baru untuk ditampilkan di halaman utama
    //     $html = '';
    //     if ($mataKuliahDitampilkan->isEmpty()) {
    //         $html = '<p class="text-xs text-gray-500">Tidak ada mata kuliah untuk semester ini.</p>';
    //     } else {
    //         foreach ($mataKuliahDitampilkan as $mk) {
    //             $html .= '<div id="selected-' . $mk->kode_mk . '" class="p-4 bg-gray-50 rounded-lg shadow mb-3">
    //                         <div class="flex items-center gap-2">
    //                             <i class="fas fa-check text-green-500"></i>
    //                             <div>
    //                                 <h4 class="font-semibold text-sm">' . $mk->nama_mk . '</h4>
    //                                 <p class="text-xs">' . strtoupper($mk->jenis_mk) . ' (' . $mk->kode_mk . ')</p>
    //                                 <p class="text-xs">SMT ' . $mk->semester . '</p>
    //                                 <p class="text-xs">' . $mk->sks . ' SKS</p>
    //                             </div>
    //                         </div>
    //                     </div>';
    //         }
    //     }

    //     return response()->json(['html' => $html]);
    // }

}