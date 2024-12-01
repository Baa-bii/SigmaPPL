<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\IRS;                    
use App\Models\KHS;                   
use App\Models\MataKuliah; 
use App\Models\SemesterAktif; 

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
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // default 10 jika tidak ada input 'per_page'
    
        // Ambil mahasiswa berdasarkan nip_dosen dosen yang login, dengan pagination
        $mahasiswa = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)
            ->when($angkatan, function ($query, $angkatan) {
                return $query->where('angkatan', $angkatan);
            })
            ->when($search, function ($query, $search) {
                return $query->where('nama_mhs', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);
    
        // Hitung IP Lalu untuk setiap mahasiswa
        foreach ($mahasiswa as $mhs) {
            $mhs->ip_lalu = $this->hitungIPLalu($mhs->nim)['ip_lalu']; // Menghitung IP Lalu
            $mhs->sks_ips = $this->hitungIPLalu($mhs->nim)['sks']; // Menghitung SKS untuk IPS
        }

        // Loop untuk menghitung SKS Diambil dan menentukan Status
        foreach ($mahasiswa as $mhs) {
            // Cek semester aktif terakhir
            $semesterAktif = SemesterAktif::where('nim', $mhs->nim)
                ->where('is_active', 1)  // Semester yang sedang aktif
                ->latest('tahun_akademik') // Ambil semester terakhir
                ->first();

            if ($semesterAktif) {
                // Tentukan status berdasarkan semester aktif
                if ($semesterAktif->status == 'Belum Registrasi') {
                    $mhs->status = 'Belum Registrasi';
                    $mhs->sks_diambil = '-';
                } elseif ($semesterAktif->status == 'Cuti') {
                    $mhs->status = 'Cuti';
                    $mhs->sks_diambil = '-';
                } elseif ($semesterAktif->status == 'Aktif') {
                    // Cek IRS untuk semester aktif
                    $irs = IRS::where('id_TA', $semesterAktif->id)
                        ->where('nim', $mhs->nim)
                        ->first(); // Ambil IRS berdasarkan semester aktif dan NIM

                    if (!$irs) {
                        $mhs->status = 'Belum Isi IRS';
                        $mhs->sks_diambil = '-';
                    } else {
                        // Hitung total SKS
                        $totalSKS = 0;
                        foreach ($irs->mataKuliah as $mk) {
                            $totalSKS += $mk->sks;
                        }
                        $mhs->sks_diambil = $totalSKS;

                        // Tentukan status berdasarkan IRS
                        if ($irs->status == 'Sudah Disetujui') {
                            $mhs->status = 'Sudah Disetujui';
                        } else {
                            $mhs->status = 'Belum Disetujui';
                        }
                    }
                }
            }
        }
    
        // Ambil angkatan unik
        $angkatanList = Mahasiswa::where('nip_dosen', $dosen->nip_dosen)
            ->select('angkatan')
            ->distinct()
            ->pluck('angkatan');
    
        // Kirim data mahasiswa, angkatanList, dan angkatan ke view
        return view('content.dosen.perwalian', compact('mahasiswa', 'angkatanList', 'angkatan', 'perPage', 'search'));
    }
        
    // Function untuk menghitung IP Lalu
    private function hitungIPLalu($nim)
    {
        // Ambil semester aktif terakhir berdasarkan NIM
        $semesterAktif = SemesterAktif::where('nim', $nim)
            ->where('status', 'Aktif') // Semester yang statusnya aktif
            ->where('is_active', 0)    // Semester yang is_active = 0
            ->latest('tahun_akademik') // Ambil semester yang paling terakhir
            ->first();

        // Jika tidak ditemukan riwayat semester aktif, kembalikan nilai IP 0
        if (!$semesterAktif) {
            return ['ip_lalu' => 0, 'sks' => 0]; // Tidak ada data semester aktif, IP Lalu 0
        }

        // Ambil id semester aktif yang ditemukan
        $idSemesterAktif = $semesterAktif->id;

        // Ambil IRS berdasarkan id_TA yang didapat dari semester aktif dan nim
        $irs = IRS::where('id_TA', $idSemesterAktif)
            ->where('nim', $nim)
            ->get(); // Ambil semua mata kuliah yang diambil pada semester aktif tersebut

        // Jika tidak ada IRS ditemukan, kembalikan nilai IP 0
        if ($irs->isEmpty()) {
            return ['ip_lalu' => 0, 'sks' => 0]; // Tidak ada IRS berarti IP Lalu 0
        }

        // Variabel untuk menghitung total SKS dan total bobot
        $totalSKS = 0;
        $totalBobot = 0;

        // Loop untuk menghitung total SKS dan total bobot
        foreach ($irs as $ir) {
            // Ambil data KHS berdasarkan id_irs yang ada di IRS
            $khs = KHS::where('id_irs', $ir->id)->first();

            // Jika tidak ada data KHS, skip IRS ini
            if (!$khs) {
                continue; // Jika tidak ada nilai KHS, skip IRS ini
            }

            // Tentukan bobot berdasarkan nilai yang ada di KHS
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

            // Ambil SKS mata kuliah yang diambil dari IRS
            $matakuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();

            // Jika mata kuliah tidak ditemukan, skip
            if (!$matakuliah) {
                continue; // Skip jika tidak ada data mata kuliah
            }

            // Tambahkan SKS dan bobot * SKS ke total
            $totalSKS += $matakuliah->sks;
            $totalBobot += $matakuliah->sks * $bobot;
        }

        // Menghitung IP: (Total SKS * Bobot) / Total SKS
        $ipLalu = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;

        // Mengembalikan nilai IP dan total SKS
        return [
            'ip_lalu' => number_format($ipLalu, 2),  // Format dengan 2 angka di belakang koma
            'sks' => $totalSKS
        ];
    }

    // Function untuk menghitung IPK (Kumulatif)
    private function hitungIPK($nim)
    {
        // Ambil semua semester yang sudah selesai (is_active = 0) berdasarkan NIM
        $semesterAktif = SemesterAktif::where('nim', $nim)
            ->where('status', 'Aktif') // Semester yang statusnya aktif
            ->where('is_active', 0) // Semester yang sudah selesai
            ->get(); // Ambil semua semester yang sudah selesai

        // Jika tidak ada semester ditemukan, kembalikan nilai IPK 0
        if ($semesterAktif->isEmpty()) {
            return ['ipk' => 0, 'sks' => 0];
        }

        // Variabel untuk menghitung total SKS dan total bobot
        $totalSKS = 0;
        $totalBobot = 0;

        // Loop untuk menghitung total SKS dan total bobot untuk setiap semester
        foreach ($semesterAktif as $semester) {
            // Ambil IRS berdasarkan id_TA yang didapat dari semester aktif dan nim
            $irs = IRS::where('id_TA', $semester->id)
                ->where('nim', $nim)
                ->get();

            // Loop untuk menghitung total SKS dan total bobot untuk setiap IRS
            foreach ($irs as $ir) {
                // Ambil data KHS berdasarkan id_irs yang ada di IRS
                $khs = KHS::where('id_irs', $ir->id)->first();

                // Jika tidak ada data KHS, skip IRS ini
                if (!$khs) {
                    continue;
                }

                // Tentukan bobot berdasarkan nilai yang ada di KHS
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

                // Ambil SKS mata kuliah yang diambil dari IRS
                $matakuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();

                // Jika mata kuliah tidak ditemukan, skip
                if (!$matakuliah) {
                    continue;
                }

                // Tambahkan SKS dan bobot * SKS ke total
                $totalSKS += $matakuliah->sks;
                $totalBobot += $matakuliah->sks * $bobot;
            }
        }

        // Menghitung IPK: (Total SKS * Bobot) / Total SKS
        $ipk = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;

        // Mengembalikan nilai IPK dan total SKS
        return [
            'ipk' => number_format($ipk, 2),  // Format dengan 2 angka di belakang koma
            'sks' => $totalSKS
        ];
    }

    // Function untuk menghitung Max Beban SKS
    private function hitungMaxBebanSKS($ips, $sks)
    {
        // Tentukan max beban SKS berdasarkan nilai IPS
        if ($ips < 2.00) {
            return ['max_beban_sks' => 18, 'sks' => $sks]; // Maksimal 18 SKS untuk IPS < 2.00
        } elseif ($ips >= 2.00 && $ips <= 2.49) {
            return ['max_beban_sks' => 20, 'sks' => $sks]; // Maksimal 20 SKS untuk IPS 2.00 - 2.49
        } elseif ($ips >= 2.50 && $ips <= 2.99) {
            return ['max_beban_sks' => 22, 'sks' => $sks]; // Maksimal 22 SKS untuk IPS 2.50 - 2.99
        } else {
            return ['max_beban_sks' => 24, 'sks' => $sks]; // Maksimal 24 SKS untuk IPS >= 3.00
        }
    }

    public function show($nim)
    {
        // Ambil data mahasiswa beserta program studi yang terkait
        $mahasiswa = Mahasiswa::with('programStudi')->where('nim', $nim)->firstOrFail();
        
        // Ambil data semester aktif berdasarkan NIM mahasiswa
        $semesterAktif = SemesterAktif::where('nim', $nim)
            ->where('is_active', 1) // Pastikan semester aktif
            ->first(); // Ambil yang pertama atau yang terbaru

        // Jika data semester aktif tidak ditemukan, set nilai default
        $tahunAkademik = $semesterAktif ? $semesterAktif->tahun_akademik : 'Not Found';
        $semester = $semesterAktif ? $semesterAktif->semester : 'Not Found';
        
        // Hitung IPS dan IPK
        $ipsData = $this->hitungIPLalu($nim);
        $ipkData = $this->hitungIPK($nim);

        $ips = $ipsData['ip_lalu'];
        $ipk = $ipkData['ipk'];

        // Hitung Max Beban SKS berdasarkan IPS yang dihitung
        $maxBebanSKSData = $this->hitungMaxBebanSKS($ips, $ipsData['sks']);

        // Panggil fungsi private untuk mendapatkan data semester aktif dan status IRS untuk accordion
        list($semesterAktifData, $hasIRS) = $this->accordionData($nim);

        // Kirim data ke view
        return view('content.dosen.detailmhs', compact(
            'mahasiswa', 
            'tahunAkademik', 
            'semester', 
            'ips', 
            'ipk', 
            'ipsData', 
            'ipkData', 
            'maxBebanSKSData', 
            'semesterAktifData', 
            'hasIRS'
        ));
    }

    private function accordionData($nim)
    {
        // Ambil semua semester aktif mahasiswa berdasarkan NIM
        $semesterAktif = SemesterAktif::where('nim', $nim)
            ->orderBy('tahun_akademik', 'asc')
            ->get();

        // Ambil semester terbaru yang is_active = 1
        $semesterTerbaru = $semesterAktif->firstWhere('is_active', 1);

        // Cek apakah semester terbaru sudah memiliki IRS
        $hasIRS = false;
        $semesterAktifData = []; // Menyimpan data semester aktif dengan jumlah SKS
        
        if ($semesterTerbaru) {
            $hasIRS = IRS::where('id_TA', $semesterTerbaru->id)->exists();
        }

        // Loop untuk menghitung total SKS per semester
        foreach ($semesterAktif as $semester) {
            // Cek apakah semester ini memiliki IRS
            $irs = IRS::where('id_TA', $semester->id)->get();
            
            // Hitung total SKS untuk semester ini
            $totalSKS = 0;
            foreach ($irs as $ir) {
                $mataKuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();
                if ($mataKuliah) {
                    $totalSKS += $mataKuliah->sks;
                }
            }
            
            // Tambahkan data semester dan jumlah SKS ke array
            $semester->jumlah_sks = $totalSKS;
            $semesterAktifData[] = $semester;
        }

        // Kembalikan data semester aktif dan status IRS
        return [$semesterAktifData, $hasIRS];
    }

}
