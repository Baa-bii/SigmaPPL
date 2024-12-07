<?php

namespace App\Http\Controllers\Mhs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterAktif;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\MataKuliah;
use App\Models\IRS;
use App\Models\KHS;


class BuatIRSController extends Controller
{
    // public function addDefaultMK(){
    //     $user = auth()->user();
    //     $mhs = $user->mahasiswa;

    //     if (!$mhs) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    //     }
        
    //     // Ambil semester aktif yang sesuai dengan kondisi
    //     $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
    //     if (!$semesterAktif) {
    //         return redirect()->route('mhs.dashboard.index')->with('error', 'Semester aktif tidak ditemukan.');
    //     }
    //     $status = $semesterAktif?->status ?? 'Belum Registrasi';
    //     $semester = $semesterAktif?->semester ?? null;

    //     $mataKuliahDefault = MataKuliah::where('semester', $semester)->get();
    //     // Loop untuk menyimpan mata kuliah default yang sesuai dengan semester aktif
    //     foreach ($mataKuliahDefault as $mk) {
    //         Irs::updateOrCreate(
    //             [
    //                 'nim' => $mhs->nim,          // NIM mahasiswa
    //                 'kode_mk' => $mk->kode_mk,   // Kode mata kuliah
    //                 'id_TA' => $semesterAktif->id,  // ID semester aktif
    //             ],
    //             [
    //                 'status' => 'Belum Disetujui',  // Status awal mata kuliah
    //                 'status_mata_kuliah' => 'BARU' // Status mata kuliah (baru pertama kali)
    //             ]
    //         );
    //     }
    // }
    public function index()
    {
        $user = auth()->user();
        $mhs = $user->mahasiswa;
        // $this->addDefaultMK();
        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
        $status = $semesterAktif?->status ?? 'Belum Registrasi';
        $semester = $semesterAktif?->semester ?? null;
        $nim = $mhs->nim;

        $mataKuliah = MataKuliah::select('kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk')->get();
    
        // $mataKuliahDitampilkan = Irs::where('nim', $mhs->nim)
        //     ->where('id_TA', SemesterAktif::where('is_active', true)->first()->id)
        //     ->get()
        //     ->map(function($irs) {
        //         return MataKuliah::where('kode_mk', $irs->kode_mk)->first();
        // });

        // $mataKuliahDipilih = Irs::where('nim', $mhs->nim)
        //     ->where('id_TA', SemesterAktif::where('status', 'aktif')->first()->id)
        //     ->get()
        //     ->map(function($irs) {
        //         return MataKuliah::where('kode_mk', $irs->kode_mk)->first();
        //     });
           
        // $jadwal = DB::table('irs')
        // ->join('semester_aktif', 'irs.id_TA', '=', 'semester_aktif.id')
        // ->join('jadwal', 'irs.kode_mk', '=', 'jadwal.kode_mk')
        // ->join('waktu', 'jadwal.id_waktu', '=', 'waktu.id')
        // ->join('matakuliah', 'jadwal.kode_mk', '=', 'matakuliah.kode_mk')
        // ->join('ruang', 'jadwal.id_ruang', '=', 'ruang.id')
        // ->select(
        //     DB::raw("UPPER(jadwal.hari) as hari"),
        //     DB::raw("TIME_FORMAT(waktu.jam_mulai, '%H:%i') as jam_mulai"),
        //     'jadwal.id_jadwal as id_jadwal',
        //     'jadwal.kode_mk',
        //     'jadwal.kelas',
        //     'matakuliah.nama_mk',
        //     'matakuliah.jenis_mk',
        //     'matakuliah.semester',
        //     'matakuliah.sks',
        //     DB::raw("CONCAT(ruang.gedung, '', ruang.nama) as ruangan"), // Menggabungkan nama dan gedung
        //         'ruang.kapasitas'              // Tambahkan 'kapasitas'
        // )
        // ->where('irs.nim', '=', $mhs->nim)
        // ->where('semester_aktif.is_active', '=', 1)
        // ->orderBy('jadwal.hari')
        // ->orderBy('waktu.jam_mulai')
        // ->get();
         
        // // Menghitung jam_selesai untuk setiap jadwal
        // $jadwal = $jadwal->map(function ($item) {
        //     // Membuat instance Carbon dari jam_mulai
        //     $jamMulai = Carbon::createFromFormat('H:i', $item->jam_mulai);

        //     // Menambahkan waktu berdasarkan SKS (1 SKS = 50 menit)
        //     $jamSelesai = $jamMulai->copy()->addMinutes($item->sks * 50)->format('H:i');

        //     // Menambahkan jam_selesai ke setiap item jadwal
        //     $item->jam_selesai = $jamSelesai;

        //     $jumlahMahasiswaTerdaftar = DB::table('irs')
        //         ->where('kode_mk', $item->kode_mk)
        //         ->where('id_TA', function($query) {
        //             $query->select('id')
        //                 ->from('semester_aktif')
        //                 ->where('is_active', true)
        //                 ->limit(1);
        //         })
        //         ->whereNotNull('id_jadwal')
        //         ->where('id_jadwal', '!=', '')
        //         ->count();
        //     //dd($jumlahMahasiswaTerdaftar);
        //     // Menghitung slot yang tersisa
        //     $item->slot_tersisa = $item->kapasitas >= $jumlahMahasiswaTerdaftar;

        //     return $item;
        // });
        
        $selectedJadwal = Irs::where('nim', $mhs->nim)
        ->where('id_TA', $semesterAktif->id)
        ->whereNotNull('id_jadwal')
        ->get()
        ->pluck('id_jadwal')
        ->toArray();

        // Ambil detail semua jadwal yang sudah dipilih
        $jadwal = Jadwal::whereIn('id_jadwal', $selectedJadwal)
            ->with(['waktu', 'matakuliah', 'ruang'])
            ->get();
        $conflictingJadwal = [];
        foreach ($selectedJadwal as $id_jadwal) {
            $jadwalSelected = Jadwal::with('waktu')->find($id_jadwal);

            if ($jadwalSelected) {
                $hari = $jadwalSelected->hari;
                $jamMulai = $jadwalSelected->waktu->jam_mulai;

                // Cari jadwal lain yang memiliki hari dan jam_mulai yang sama, namun belum dipilih
                $conflicts = Jadwal::where('hari', $hari)
                    ->whereHas('waktu', function($query) use ($jamMulai) {
                        $query->where('jam_mulai', $jamMulai);
                    })
                    ->whereNotIn('id_jadwal', $selectedJadwal)
                    ->pluck('id_jadwal')
                    ->toArray();

                $conflictingJadwal = array_merge($conflictingJadwal, $conflicts);
            }
        }
        // Menghitung IP Semester Lalu
        $ips = $this->hitungIpSemesterLalu($nim, $semesterAktif);

        // Menghitung IPK berdasarkan semua semester yang sudah diambil
        $ipk = $this->hitungIpk($nim);

        $maxSKS = $this->hitungMaxBebanSKS($ips);

        $conflictingJadwal = $this->deteksiKonflikJadwal($selectedJadwal);

        return view('content.mhs.akademik', compact('mhs', 'status', 'semester', 'mataKuliah', 'ipk', 'ips', 'maxSKS', 'conflictingJadwal', 'jadwal'));
    }
    public function getJadwal($kode_mk)
    {
        // Ambil semester aktif
        $semesterAktif = SemesterAktif::where('is_active', true)->first();

        if (!$semesterAktif) {
            return response()->json(['error' => 'Semester aktif tidak ditemukan.'], 404);
        }

        // Ambil semua jadwal untuk mata kuliah tersebut di semester aktif
        $jadwal = Jadwal::with(['waktu', 'ruang', 'matakuliah'])
            ->where('kode_mk', $kode_mk)
            ->where('id_ruang', '!=', null)
            ->get();
        if ($jadwal->isEmpty()) {
            Log::warning("Jadwal tidak ditemukan untuk mata kuliah: $kodeMk");
            return response()->json(['error' => 'Jadwal tidak ditemukan untuk mata kuliah ini.'], 404);
        }
        // Proses setiap jadwal untuk menghitung jam selesai dan slot tersisa
        $jadwal = $jadwal->map(function ($item) use ($semesterAktif, $kode_mk) {
            // Hitung jam selesai
            $jamMulai = Carbon::createFromFormat('H:i', $item->waktu->jam_mulai);
            $jamSelesai = $jamMulai->copy()->addMinutes($item->matakuliah->sks * 50)->format('H:i');
            $item->jam_selesai = $jamSelesai;

            // Hitung slot yang tersisa
            $jumlahMahasiswaTerdaftar = IRS::where('kode_mk', $kode_mk)
                ->where('id_TA', $semesterAktif->id)
                ->whereNotNull('id_jadwal')
                ->where('id_jadwal', '!=', '')
                ->count();

            $item->slot_tersisa = $item->ruang->kapasitas - $jumlahMahasiswaTerdaftar;

            return $item;
        });

        return response()->json($jadwal);
    }
    
    private function deteksiKonflikJadwal($selectedJadwal)
    {
        $conflictingJadwal = [];

        // Ambil detail semua jadwal yang dipilih
        $selectedJadwalDetails = Jadwal::whereIn('id_jadwal', $selectedJadwal)->with('waktu')->get();

        foreach ($selectedJadwalDetails as $jadwal) {
            $hari = strtoupper($jadwal->hari);
            $jamMulai = Carbon::createFromFormat('H:i', $jadwal->waktu->jam_mulai);
            $jamSelesai = $jamMulai->copy()->addMinutes($jadwal->matakuliah->sks * 50)->format('H:i');

            // Cari jadwal lain yang sama hari dan overlapping waktu
            $conflicts = Jadwal::where('hari', $hari)
                ->whereHas('waktu', function($query) use ($jamMulai, $jamSelesai) {
                    $query->where(function($q) use ($jamMulai, $jamSelesai) {
                        $q->where('jam_mulai', '<', $jamSelesai)
                          ->where('jam_selesai', '>', $jamMulai->format('H:i'));
                    });
                })
                ->whereNotIn('id_jadwal', $selectedJadwal)
                ->pluck('id_jadwal')
                ->toArray();

            $conflictingJadwal = array_merge($conflictingJadwal, $conflicts);
        }

        // Hapus duplikasi
        $conflictingJadwal = array_unique($conflictingJadwal);

        return $conflictingJadwal;
    }

    public function isiIrs(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id_jadwal',
        ]);

        $jadwalId = $request->input('jadwal_id');
        
        $user = auth()->user();
        $mhs = $user->mahasiswa;
        if (!$mhs) {
            return response()->json(['status' => 'error', 'message' => 'Data mahasiswa tidak ditemukan.'], 404);
        }
        $nim = $mhs->nim;
        
        $semesterAktif = SemesterAktif::where('is_active', true)->first();
        if (!$semesterAktif) {
            return response()->json(['status' => 'error', 'message' => 'Semester aktif tidak ditemukan.'], 404);
        }
        
        // Ambil jadwal beserta relasi waktu
        $jadwal = Jadwal::with('waktu')->find($jadwalId);
        if (!$jadwal) {
            return response()->json(['status' => 'error', 'message' => 'Jadwal tidak ditemukan.'], 404);
        }
        if (is_null($jadwal->waktu->jam_mulai)) {
            Log::error("Jadwal ID $jadwalId memiliki jam_mulai null.");
            return response()->json(['status' => 'error', 'message' => 'Jam mulai jadwal tidak valid.'], 400);
        }

        $kodeMk = $jadwal->kode_mk;
        $hari = strtoupper($jadwal->hari);
        $jamMulai = $jadwal->waktu->jam_mulai;
        
        // Cek apakah jadwal tersebut sudah dipilih oleh mahasiswa
        $existingIrs = IRS::where('nim', $nim)
            ->where('id_TA', $semesterAktif->id)
            ->where('kode_mk', $kodeMk)
            ->whereNotNull('id_jadwal')
            ->where('id_jadwal', $jadwalId)
            ->first();

        if ($existingIrs) {
            return response()->json(['status' => 'error', 'message' => 'Jadwal sudah dipilih sebelumnya.'], 400);
        }

        // Cek apakah mahasiswa sudah memilih jadwal lain pada waktu yang sama
        $conflict = IRS::where('nim', $nim)
            ->where('id_TA', $semesterAktif->id)
            ->whereHas('jadwal', function($query) use ($hari, $jamMulai) {
                $query->where('hari', $hari)
                      ->where('jam_mulai', $jamMulai);
            })
            ->exists();

        if ($conflict) {
            return response()->json(['status' => 'error', 'message' => 'Ada konflik jadwal dengan mata kuliah lain yang sudah dipilih.'], 400);
        }

        // Cek apakah slot tersisa
        $jumlahMahasiswaTerdaftar = IRS::where('kode_mk', $kodeMk)
            ->where('id_TA', $semesterAktif->id)
            ->whereNotNull('id_jadwal')
            ->where('id_jadwal', '!=', '')
            ->count();

        if ($jumlahMahasiswaTerdaftar >= $jadwal->ruang->kapasitas) {
            return response()->json(['status' => 'error', 'message' => 'Kapasitas ruang sudah penuh.'], 400);
        }

        // Simpan ke IRS
        IRS::create([
            'nim' => $nim,
            'kode_mk' => $kodeMk,
            'id_TA' => $semesterAktif->id,
            'id_jadwal' => $jadwalId,
            'status' => 'Belum Disetujui',
            'status_mata_kuliah' => 'BARU'
        ]);

        return response()->json(['status' => 'success', 'message' => 'Jadwal berhasil dipilih dan diupdate di IRS.'], 200);
    }
    

    private function hitungIpSemesterLalu($nim, $semesterAktif)
    {
        $semesterLalu = SemesterAktif::where('is_active', false)->latest()->first(); // Ambil semester terakhir yang tidak aktif
        $totalSKS = 0;
        $totalBobot = 0;

        if ($semesterLalu) {
            $irs = IRS::where('id_TA', $semesterLalu->id)->where('nim', $nim)->get();

            foreach ($irs as $ir) {
                $khs = KHS::where('id_irs', $ir->id)->first();
                if (!$khs) continue;

                $bobot = 0;
                switch ($khs->nilai) {
                    case 'A': $bobot = 4.00; break;
                    case 'AB': $bobot = 3.50; break;
                    case 'B': $bobot = 3.00; break;
                    case 'BC': $bobot = 2.50; break;
                    case 'C': $bobot = 2.00; break;
                    case 'D': $bobot = 1.00; break;
                    case 'E': $bobot = 0.00; break;
                }

                $matakuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();
                if (!$matakuliah) continue;

                $totalSKS += $matakuliah->sks;
                $totalBobot += $matakuliah->sks * $bobot;
            }
        }

        return $totalSKS > 0 ? number_format($totalBobot / $totalSKS, 2) : 0; // IP Semester Lalu
    }

    // Fungsi untuk menghitung IPK
    private function hitungIpk($nim)
    {
        $totalSKS = 0;
        $totalBobot = 0;

        $irs = IRS::where('nim', $nim)->get();

        foreach ($irs as $ir) {
            $khs = KHS::where('id_irs', $ir->id)->first();
            if (!$khs) continue;

            $bobot = 0;
            switch ($khs->nilai) {
                case 'A': $bobot = 4.00; break;
                case 'AB': $bobot = 3.50; break;
                case 'B': $bobot = 3.00; break;
                case 'BC': $bobot = 2.50; break;
                case 'C': $bobot = 2.00; break;
                case 'D': $bobot = 1.00; break;
                case 'E': $bobot = 0.00; break;
            }

            $matakuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();
            if (!$matakuliah) continue;

            $totalSKS += $matakuliah->sks;
            $totalBobot += $matakuliah->sks * $bobot;
        }

        return $totalSKS > 0 ? number_format($totalBobot / $totalSKS, 2) : 0; // IPK
    }
    

    private function hitungMaxBebanSKS($ips)
    {
        if ($ips < 2.00) {
            return 18;
        } elseif ($ips >= 2.00 && $ips < 3.00) {
            return 20;
        } elseif ($ips >= 3.00 && $ips < 3.50) {
            return 22;
        } else {
            return 24;
        }
    }
    public function updateMK(Request $request)
{
    $user = auth()->user();
    $mhs = $user->mahasiswa;

    if (!$mhs) {
        return response()->json(['status' => 'error', 'message' => 'Data mahasiswa tidak ditemukan.'], 404);
    }

    // Ambil semester aktif
    $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
    if (!$semesterAktif) {
        return response()->json(['status' => 'error', 'message' => 'Semester aktif tidak ditemukan.'], 404);
    }

    // Ambil data mata kuliah yang dipilih
    $mataKuliahDipilih = $request->input('mata_kuliah', []);

    // Validasi mata kuliah yang dipilih
    $validMataKuliah = MataKuliah::whereIn('kode_mk', $mataKuliahDipilih)
        ->where('semester', $semesterAktif->semester)
        ->pluck('kode_mk')
        ->toArray();

    // Filter mata kuliah yang valid
    $mataKuliahDipilih = array_intersect($mataKuliahDipilih, $validMataKuliah);

    // Hapus mata kuliah yang tidak dipilih dari IRS
    IRS::where('nim', $mhs->nim)
        ->where('id_TA', $semesterAktif->id)
        ->whereNotIn('kode_mk', $mataKuliahDipilih)
        ->delete();

    // Tambahkan mata kuliah yang baru dipilih tanpa jadwal
    foreach ($mataKuliahDipilih as $kodeMk) {
        // Pastikan mata kuliah belum ada di IRS
        $existingIrs = IRS::where('nim', $mhs->nim)
            ->where('id_TA', $semesterAktif->id)
            ->where('kode_mk', $kodeMk)
            ->first();

        if (!$existingIrs) {
            IRS::create([
                'nim' => $mhs->nim,
                'kode_mk' => $kodeMk,
                'id_TA' => $semesterAktif->id,
                'id_jadwal' => null, // Belum memilih jadwal
                'status' => 'Belum Disetujui',
                'status_mata_kuliah' => 'BARU'
            ]);
        }
    }

    return response()->json(['status' => 'success', 'message' => 'Mata kuliah berhasil diperbarui.'], 200);
}

//     public function isiIrs(Request $request)
//     {
//         $request->validate([
//             'jadwal_id' => 'required|exists:jadwal,id_jadwal',
//         ]);

//         $jadwalId = $request->input('jadwal_id');
        
//         $user = auth()->user();
//         $mhs = $user->mahasiswa;
//         if (!$mhs) {
//             return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
//         }
//         $nim = $mhs->nim;
        
//         $semesterAktif = SemesterAktif::where('is_active', true)->first();
//         if (!$semesterAktif) {
//             return redirect()->back()->with('error', 'Semester aktif tidak ditemukan.');
//         }
//         // Ambil jadwal beserta relasi waktu
//         $jadwal = Jadwal::with('waktu')->find($jadwalId);
//         if (!$jadwal) {
//             return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
//         }
//         if (is_null($jadwal->waktu->jam_mulai)) {
//             Log::error("Jadwal ID $jadwalId memiliki jam_mulai null.");
//             return redirect()->back()->with('error', 'Jam mulai jadwal tidak valid.');
//         }


//         $kodeMk = $jadwal->kode_mk;
//         $hari = $jadwal->hari;
//         $jamMulai = $jadwal->waktu->jam_mulai;
        
//         $updated = Irs::where('nim', $nim)
//             ->where('id_TA', $semesterAktif->id)
//             ->where('kode_mk', $kodeMk)
//             ->whereNull('id_jadwal')
//             ->update(['id_jadwal' => $jadwalId]);

//         if ($updated) {
//             return redirect()->back()->with('status', 'IRS berhasil diupdate');
//         } else {
//             Log::warning("Tidak ada IRS yang diperbarui untuk NIM: $nim, Kode MK: $kodeMk");
//             return redirect()->back()->with('error', 'Tidak ada IRS yang diperbarui. Pastikan Anda memiliki IRS yang belum diisi.');
//         }
        
//     }
//     // Tambahkan ini di dalam BuatIRSController

// public function getJadwal($kode_mk)
// {
//     // Ambil semester aktif
//     $semesterAktif = SemesterAktif::where('is_active', true)->first();

//     if (!$semesterAktif) {
//         return response()->json(['error' => 'Semester aktif tidak ditemukan.'], 404);
//     }

//     // Ambil semua jadwal untuk mata kuliah tersebut di semester aktif
//     $jadwal = Jadwal::with(['waktu', 'ruang'])
//         ->where('kode_mk', $kode_mk)
//         ->where('id_ruang', '!=', null)
//         ->get();

//     // Proses setiap jadwal untuk menghitung jam selesai dan slot tersisa
//     $jadwal = $jadwal->map(function ($item) use ($semesterAktif, $kode_mk) {
//         // Hitung jam selesai
//         $jamMulai = Carbon::createFromFormat('H:i', $item->waktu->jam_mulai);
//         $jamSelesai = $jamMulai->copy()->addMinutes($item->matakuliah->sks * 50)->format('H:i');
//         $item->jam_selesai = $jamSelesai;

//         // Hitung jumlah mahasiswa yang sudah terdaftar
//         $jumlahMahasiswaTerdaftar = IRS::where('kode_mk', $kode_mk)
//             ->where('id_TA', $semesterAktif->id)
//             ->whereNotNull('id_jadwal')
//             ->where('id_jadwal', '!=', '')
//             ->count();

//         // Hitung slot tersisa
//         $item->slot_tersisa = $item->ruang->kapasitas - $jumlahMahasiswaTerdaftar;

//         return $item;
//     });

//     return response()->json($jadwal);
// }



    // public function updateIRS(Request $request)
    // { 
    //     $request->validate([
    //         'jadwal_id' => 'required|exists:jadwals,id', // Pastikan jadwal_id valid dan ada di tabel jadwals
            
    //     ]);
        
    //     $user = auth()->user();
    //     $mhs = $user->mahasiswa;
    //     if (!$mhs) {
    //         return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
    //     }

    //     $jadwalId = $request->input('jadwal_id');

    //     $semesterAktif = SemesterAktif::where('is_active', true)->first();
    //     if (!$semesterAktif) {
    //         return redirect()->back()->with('error', 'Semester aktif tidak ditemukan.');
    //     }
    //      // Periksa apakah jadwal sudah ada di IRS
    //         $existingIrs = Irs::where('nim', $mhs->nim)
    //         ->where('id_TA', $semesterAktif->id)
    //         ->where('id_jadwal', $jadwalId)
    //         ->first();

    //     if ($existingIrs) {
    //         return redirect()->back()->with('error', 'Mata kuliah ini sudah ditambahkan ke IRS Anda.');
    //     }
        
    //     Irs::create([
    //         'nim' => $mhs->nim,
    //         'id_TA' => $semesterAktif->id,
    //         'id_jadwal' => $jadwalId,
    //     ]);

    //     return response()->json(['success' => 'IRS berhasil diperbarui!'], 200);
    // }

    
    // public function irsTemp(){
    //     // Ambil user yang sedang login
    //     // $user = Auth::user();

    //     // // Ambil data dosen terkait user
    //     // $mhs = Mahasiswa::where('email', $user->email)->first();
    //     // $user = auth()->user();
    //     // $mhs = $user->mahasiswa;

    //     return view('content.mhs.irsSementara');
    // }

}