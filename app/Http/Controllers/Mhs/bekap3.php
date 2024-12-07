<?php

namespace App\Http\Controllers\Mhs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    
    public function index()
    {
        $user = auth()->user();
        $mhs = $user->mahasiswa;
        $timeslots = ['06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
        $days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT'];
        if (!$mhs) {
            return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        
        $semesterAktif = $mhs->semester_aktif()->where('is_active', true)->first();
        $status = $semesterAktif?->status ?? 'Belum Registrasi';
        $semester = $semesterAktif?->semester ?? null;
        $nim = $mhs->nim;
        $tahunAkademik = $semesterAktif?->tahun_akademik;
        $tahunAkademikArr = explode(' ', $tahunAkademik); // Misalnya, ["2024/2025", "Ganjil"]
        $semesterGanjil = ($tahunAkademikArr[1] === 'Ganjil');
        
        $selectedJadwal = IRS::where('nim', $mhs->nim)
            ->where('id_TA', $semesterAktif->id)
            ->whereNotNull('id_jadwal')
            ->pluck('id_jadwal')
            ->toArray();

        // Ambil semua jadwal untuk ditampilkan
        $jadwal = Jadwal::with(['matakuliah', 'ruang'])
            ->get();

        $selectedMataKuliah = Jadwal::whereIn('id_jadwal', $selectedJadwal)
            ->pluck('kode_mk')
            ->unique()
            ->toArray();
        $mataKuliah = MataKuliah::select('kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk')
        ->where(function ($query) use ($semesterGanjil) {
            if ($semesterGanjil) {
                // Semester Ganjil: Ambil mata kuliah untuk semester 1, 3, 5, dst.
                $query->whereIn('semester', ['1', '3', '5', '0']); // Semester ganjil termasuk pilihan (0)
            } else {
                // Semester Genap: Ambil mata kuliah untuk semester 2, 4, 6, dst.
                $query->whereIn('semester', ['2', '4', '6', '0']);
            }
        })
        ->orWhereIn('kode_mk', $selectedMataKuliah)
        ->orderBy('semester', 'asc')
        ->get();

        
        // $jadwal = Jadwal::whereIn('id_jadwal', $selectedJadwal)
        // ->with(['waktu', 'matakuliah', 'ruang'])
        // ->get()
        // ->map(function ($item) use ($semester) {
        //     // Tandai jadwal yang sesuai dengan semester aktif
        //     $item->checked = $item->matakuliah->semester == $semester;
        //     $item->ruang = $item->ruang ? $item->ruang->nama : 'Tidak Ada Ruang';
        //     $item->waktu = $item->waktu ? $item->waktu->formatted_time : 'Tidak Ada Waktu';
        //     return $item;
        // });
        // $selectedMataKuliah = Jadwal::whereIn('id_jadwal', $selectedJadwal)
        // ->whereHas('matakuliah', function ($q) use ($semester) {
        //     $q->where('semester', $semester);
        // })
        // ->pluck('kode_mk')
        // ->unique()
        // ->toArray();
        
        

        // Menghitung IP Semester Lalu
        $ips = $this->hitungIpSemesterLalu($nim, $semesterAktif);

        // Menghitung IPK berdasarkan semua semester yang sudah diambil
        $ipk = $this->hitungIpk($nim);

        $maxSKS = $this->hitungMaxBebanSKS($ips);

        // Deteksi konflik jadwal
        $conflictingJadwal = $this->deteksiKonflikJadwal($selectedJadwal);

        return view('content.mhs.akademik', compact('mhs','tahunAkademik', 'status', 'semester', 'mataKuliah', 'ipk', 'ips', 'maxSKS', 'conflictingJadwal', 'jadwal', 'selectedJadwal', 'selectedMataKuliah', 'timeslots', 'days'));
    }
    

    public function getJadwal($kodeMk)
    {
        try {
            // Log untuk debugging
            Log::info("Mengambil jadwal untuk kode MK: $kodeMk");

            // Ambil semester aktif
            $semesterAktif = SemesterAktif::where('is_active', true)->first();

            if (!$semesterAktif) {
                Log::warning("Semester aktif tidak ditemukan untuk kode MK: $kodeMk");
                return response()->json(['error' => 'Semester aktif tidak ditemukan.'], 404);
            }

            // Ambil semua jadwal untuk mata kuliah tersebut di semester aktif
            $jadwal = Jadwal::with(['waktu', 'ruang', 'matakuliah'])
                ->where('kode_mk', $kodeMk)
                ->whereNotNull('id_ruang')
                ->get();

            Log::info("Jumlah jadwal ditemukan: " . $jadwal->count());

            if ($jadwal->isEmpty()) {
                Log::warning("Jadwal tidak ditemukan untuk mata kuliah: $kodeMk");
                return response()->json(['error' => 'Jadwal tidak ditemukan untuk mata kuliah ini.'], 404);
            } else {
                Log::info("Jadwal ditemukan: " . $jadwal->count() . " jadwal untuk kode MK: $kodeMk");
            }

            // Proses setiap jadwal untuk menghitung jam selesai dan slot tersisa
            $jadwal = $jadwal->map(function ($item) use ($semesterAktif, $kodeMk) {
                // Pastikan relasi tidak null
                if (!$item->waktu || !$item->matakuliah || !$item->ruang) {
                    Log::warning("Data relasi incomplete untuk jadwal ID: {$item->id_jadwal}");
                    return null; // Atau Anda bisa skip item ini
                }

                // Set 'hari' ke uppercase
                $item->hari = strtoupper($item->hari);

                // Hitung jam selesai dengan format yang benar
                try {
                    $jamMulai = Carbon::createFromFormat('H:i:s', $item->waktu->jam_mulai);
                } catch (\Exception $e) {
                    Log::error("Format jam_mulai salah untuk jadwal ID: {$item->id_jadwal}. Error: " . $e->getMessage());
                    return null;
                }

                $jamSelesai = $jamMulai->copy()->addMinutes($item->matakuliah->sks * 50)->format('H:i:s');
                $item->jam_selesai = $jamSelesai;

                // Set 'jam_mulai' sebagai properti tingkat atas
                $item->jam_mulai = $item->waktu->jam_mulai;

                // Hitung slot yang tersisa
                $jumlahMahasiswaTerdaftar = IRS::where('kode_mk', $kodeMk)
                    ->where('id_TA', $semesterAktif->id)
                    ->whereNotNull('id_jadwal')
                    ->where('id_jadwal', '!=', '')
                    ->count();

                $item->slot_tersisa = $jumlahMahasiswaTerdaftar;

                return $item;
            })->filter(); // Hapus item null

            Log::info("Mengembalikan data jadwal: " . $jadwal->toJson());

            return response()->json($jadwal);

        } catch (\Exception $e) {
            Log::error("Error dalam getJadwal: " . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil jadwal.'], 500);
        }
    }

    
    private function deteksiKonflikJadwal($selectedJadwal)
    {
        $conflictingJadwal = [];

        // Ambil detail semua jadwal yang dipilih
        $selectedJadwalDetails = Jadwal::whereIn('id_jadwal', $selectedJadwal)->with('waktu')->get();

        foreach ($selectedJadwalDetails as $jadwal) {
            $hari = strtoupper($jadwal->hari);
        
            // Ambil jam mulai dan jam selesai
            $jamMulai = Carbon::createFromFormat('H:i:s', $jadwal->waktu->jam_mulai)->format('H:i');
            $jamMulaiItung = Carbon::createFromFormat('H:i:s', $jadwal->waktu->jam_mulai);
            $jamSelesai = $jamMulaiItung->copy()->addMinutes($jadwal->matakuliah->sks * 50)->format('H:i');
        
            // Cari jadwal lain yang sama hari dan overlapping waktu
            $conflicts = Jadwal::where('hari', $hari)
                ->whereHas('waktu', function($query) use ($jamMulai, $jamSelesai) {
                    // Tidak menggunakan 'jam_selesai', tapi membandingkan berdasarkan jam_mulai dan jamSelesai
                    $query->where(function($q) use ($jamMulai, $jamSelesai) {
                        // Cek apakah jadwal yang ada tumpang tindih dengan jadwal baru
                        $q->where('jam_mulai', '<', $jamSelesai)
                          ->where('jam_mulai', '>=', $jamMulai);
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

    // public function isiIrs(Request $request)
    // {
    //     $request->validate([
    //         'jadwal_id' => 'required|exists:jadwal,id_jadwal',
    //     ]);

    //     $jadwalId = $request->input('jadwal_id');
        
    //     $user = auth()->user();
    //     $mhs = $user->mahasiswa;
    //     if (!$mhs) {
    //         return response()->json(['status' => 'error', 'message' => 'Data mahasiswa tidak ditemukan.'], 404);
    //     }
    //     $nim = $mhs->nim;

    //     $semesterAktif = SemesterAktif::where('is_active', true)->first();
    //     if (!$semesterAktif) {
    //         return response()->json(['status' => 'error', 'message' => 'Semester aktif tidak ditemukan.'], 404);
    //     }
    //     $ips = $this->hitungIpSemesterLalu($nim, $semesterAktif);
    //     $maxSKS = $this->hitungMaxBebanSKS($ips);
        
    //     // Ambil jadwal beserta relasi waktu
    //     // $jadwal = Jadwal::with('waktu')->find($jadwalId);
    //     // if (!$jadwal) {
    //     //     return response()->json(['status' => 'error', 'message' => 'Jadwal tidak ditemukan.'], 404);
    //     // }
    //     // if (is_null($jadwal->waktu->jam_mulai)) {
    //     //     Log::error("Jadwal ID $jadwalId memiliki jam_mulai null.");
    //     //     return response()->json(['status' => 'error', 'message' => 'Jam mulai jadwal tidak valid.'], 400);
    //     // }

    //     $kodeMk = $jadwal->kode_mk;
    //     $hari = strtoupper($jadwal->hari);
    //     $jamMulai = $jadwal->waktu->jam_mulai;
    //     IRS::create([
    //         'nim' => $nim,
    //         'kode_mk' => $kodeMk,
    //         'id_TA' => $semesterAktif->id,
    //         'id_jadwal' => $jadwalId,
    //         'status' => 'Belum Disetujui',  // Status awal IRS
    //         'status_mata_kuliah' => 'BARU'  // Status mata kuliah
    //     ]);
        
    //     // Cek apakah jadwal tersebut sudah dipilih oleh mahasiswa
    //     $existingIrs = IRS::where('nim', $nim)
    //         ->where('id_TA', $semesterAktif->id)
    //         ->where('kode_mk', $kodeMk)
    //         ->whereNotNull('id_jadwal')
    //         ->where('id_jadwal', $jadwalId)
    //         ->first();

    //     if ($existingIrs) {
    //         return response()->json(['status' => 'error', 'message' => 'Jadwal sudah dipilih sebelumnya.'], 400);
    //     }

    //      // Cek apakah mahasiswa sudah memilih jadwal lain pada waktu yang sama
    //      $conflict = IRS::where('nim', $nim)
    //      ->where('id_TA', $semesterAktif->id)
    //      ->whereHas('jadwal', function($query) use ($jadwal) {
    //          $query->where('hari', $jadwal->hari)
    //                ->where('jam_mulai', $jadwal->waktu->jam_mulai);
    //      })
    //      ->exists();
    

    //     if ($conflict) {
    //         return response()->json(['status' => 'error', 'message' => 'Ada konflik jadwal dengan mata kuliah lain yang sudah dipilih.'], 400);
    //     }

    //     // Cek apakah slot tersisa
    //     $jumlahMahasiswaTerdaftar = IRS::where('kode_mk', $kodeMk)
    //         ->where('id_TA', $semesterAktif->id)
    //         ->whereNotNull('id_jadwal')
    //         ->where('id_jadwal', '!=', '')
    //         ->count();

    //     if ($jumlahMahasiswaTerdaftar >= $jadwal->ruang->kapasitas) {
    //         return response()->json(['status' => 'error', 'message' => 'Kapasitas ruang sudah penuh.'], 400);
    //     }
    //     // Cek total SKS yang sudah diambil
    //     $currentSks = IRS::where('nim', $nim)
    //     ->where('id_TA', $semesterAktif->id)
    //     ->whereHas('matakuliah', function($query) {
    //         $query->select('sks');
    //     })
    //     ->sum('matakuliah.sks');
        
    //     if (($currentSks + $jadwal->matakuliah->sks) > $maxSKS) {
    //         return response()->json(['status' => 'error', 'message' => 'Beban SKS melebihi batas maksimum yang diizinkan.'], 400);
    //     }

    //     // Simpan ke IRS
    //     IRS::create([
    //         'nim' => $nim,
    //         'kode_mk' => $kodeMk,
    //         'id_TA' => $semesterAktif->id,
    //         'id_jadwal' => $jadwalId,
    //         'status' => 'Belum Disetujui',
    //         'status_mata_kuliah' => 'BARU'
    //     ]);

    //     return response()->json(['status' => 'success', 'message' => 'Jadwal berhasil dipilih dan diupdate di IRS.'], 200);
    // }
    public function isiIrs(Request $request)
{
    // Validasi bahwa jadwal_id yang diterima ada di database
    $request->validate([
        'jadwal_id' => 'required|exists:jadwal,id_jadwal',  // Memastikan jadwal_id ada di tabel jadwal
    ]);

    // Mendapatkan jadwal_id yang dipilih
    $jadwalId = $request->input('jadwal_id');
    
    // Mendapatkan data mahasiswa yang sedang login
    $user = auth()->user();
    $mhs = $user->mahasiswa;  // Mengambil data mahasiswa berdasarkan user yang login

    // Mengecek apakah mahasiswa ada di dalam sistem
    if (!$mhs) {
        return response()->json(['status' => 'error', 'message' => 'Data mahasiswa tidak ditemukan.'], 404);
    }

    // Mendapatkan NIM mahasiswa yang login
    $nim = $mhs->nim;

    // Mendapatkan semester aktif
    $semesterAktif = SemesterAktif::where('is_active', true)->first();
    if (!$semesterAktif) {
        return response()->json(['status' => 'error', 'message' => 'Semester aktif tidak ditemukan.'], 404);
    }

    // Mencari jadwal berdasarkan jadwal_id yang dipilih
    $jadwal = Jadwal::with('matakuliah')->find($jadwalId);
    if (!$jadwal) {
        return response()->json(['status' => 'error', 'message' => 'Jadwal tidak ditemukan.'], 404);
    }

    // Mengecek apakah mahasiswa sudah memilih jadwal yang sama
    $existingIrs = IRS::where('nim', $nim)
        ->where('id_TA', $semesterAktif->id)
        ->where('kode_mk', $jadwal->kode_mk)
        ->whereNotNull('id_jadwal')
        ->where('id_jadwal', $jadwalId)
        ->first();

    if ($existingIrs) {
        return response()->json(['status' => 'error', 'message' => 'Jadwal sudah dipilih sebelumnya.'], 400);
    }

    // Insert data ke dalam IRS jika tidak ada konflik
    IRS::create([
        'nim' => $nim,
        'kode_mk' => $jadwal->kode_mk,
        'id_TA' => $semesterAktif->id,
        'id_jadwal' => $jadwalId,
        'status' => 'Belum Disetujui',  // Status awal IRS
        'status_mata_kuliah' => 'BARU'  // Status mata kuliah
    ]);

    return response()->json(['status' => 'success', 'message' => 'Jadwal berhasil dipilih dan dimasukkan ke IRS.'], 200);
}

    public function simpanMk(Request $request)
    {
        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim',
            'mk' => 'required|array',
            'mk.*' => 'exists:matakuliah,kode_mk',
        ]);

        $nim = $request->input('nim');
        $mataKuliahs = $request->input('mk');

        foreach ($mataKuliahs as $kodeMk) {
            // Cek apakah sudah ada IRS record
            $existing = IRS::where('nim', $nim)
                ->where('kode_mk', $kodeMk)
                ->where('status', '!=', 'Dibatalkan') // Sesuaikan dengan status yang ada
                ->exists();

            if (!$existing) {
                // Tambahkan IRS record dengan status awal
                IRS::create([
                    'nim' => $nim,
                    'kode_mk' => $kodeMk,
                    'id_TA' => SemesterAktif::where('is_active', true)->first()->id,
                    'id_jadwal' => null,
                    'status' => 'Belum Disetujui',
                    'status_mata_kuliah' => 'BARU',
                ]);
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Mata kuliah berhasil disimpan.'], 200);
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
    public function updateMk(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required|array',
            'mata_kuliah.*' => 'exists:matakuliah,kode_mk',
        ]);
    
        $mataKuliahs = $request->input('mata_kuliah');
    
        foreach ($mataKuliahs as $kodeMk) {
            // Update IRS record jika perlu, misalnya mengubah status menjadi 'Dibatalkan'
            IRS::where('kode_mk', $kodeMk)
                ->where('status', '!=', 'Dibatalkan') // Sesuaikan dengan status yang ada
                ->update(['status' => 'Dibatalkan']);
        }
    
        return response()->json(['status' => 'success', 'message' => 'Mata kuliah berhasil dihapus dari IRS.'], 200);
    }

}