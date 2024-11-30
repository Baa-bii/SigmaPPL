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

        $mataKuliahDropdown = MataKuliah::select('kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk')->get();

        // Mata kuliah hanya untuk semester aktif mahasiswa
        $mataKuliahDitampilkan = MataKuliah::where('semester', $semester)->orderBy('jenis_mk', 'asc')->get();
    

        $jadwal = Jadwal::with(['matakuliah', 'waktu'])
            ->whereHas('matakuliah', function ($query) use ($semester) {
                $query->where('semester', $semester);
            })
            ->get()
            ->groupBy(['waktu.jam_mulai', 'hari']); // Kelompokkan berdasarkan jam dan hari

        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliahDropdown', 'mataKuliahDitampilkan', 'jadwal'));
    }

    public function saveCourseSelection(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'kode_mk' => 'required',
            'id_TA' => 'required',  // Semester aktif
        ]);
    
        $user = auth()->user();
        $mhs = $user->mahasiswa;
    
        // Cari mata kuliah berdasarkan kode MK
        $mataKuliah = MataKuliah::where('kode_mk', $request->kode_mk)->first();
    
        if ($mataKuliah) {
            // Menambahkan mata kuliah ke mahasiswa di tabel pivot IRS
            $mhs->mataKuliah()->attach($mataKuliah->kode_mk, [
                'status' => 'Belum Disetujui', // Status default
                'status_mata_kuliah' => 'BARU', // Status mata kuliah default
                'id_TA' => $request->id_TA,  // Semester aktif yang dipilih
                'tanggal_registrasi' => now(), // Tanggal registrasi saat ini
            ]);
            return response()->json(['success' => true]);
        }
    
        return response()->json(['error' => 'Mata kuliah tidak ditemukan'], 400);
    }

    public function removeCourseSelection(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string',
            'kode_mk' => 'required|string',
        ]);

        $user = auth()->user();
        $mhs = $user->mahasiswa;

        // Cari mata kuliah berdasarkan kode MK
        $mataKuliah = MataKuliah::where('kode_mk', $request->kode_mk)->first();

        if ($mataKuliah && $mhs) {
            // Menghapus mata kuliah dari IRS mahasiswa di tabel pivot
            $mhs->mataKuliah()->detach($mataKuliah->kode_mk);
            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'Mata kuliah tidak ditemukan'], 400);
    }

    public function getSelectedCourses()
    {
        $user = auth()->user();
        $mhs = $user->mahasiswa;

        // Ambil semua mata kuliah yang dipilih oleh mahasiswa
        $mataKuliahDitampilkan = $mhs->mataKuliah;

        // Tampilkan status dan tanggal registrasi dari pivot
        foreach ($mataKuliahDitampilkan as $mk) {
            echo $mk->pivot->status; // Mengakses status dari pivot
            echo $mk->pivot->status_mata_kuliah; // Mengakses status mata kuliah dari pivot
            echo $mk->pivot->id_TA; // Mengakses id_TA (semester aktif) dari pivot
            echo $mk->pivot->tanggal_registrasi; // Mengakses tanggal registrasi dari pivot
        }

        // Kirim data ke view atau frontend
        $jadwalHtml = view('path.to.selected_courses_view', compact('mataKuliahDitampilkan'))->render();

        return response()->json([
            'success' => true,
            'jadwalHtml' => $jadwalHtml
        ]);
    }




}
