<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\RiwayatSemesterAktif;  // Tambahkan import untuk model RiwayatSemesterAktif
use App\Models\IRS;                    // Tambahkan import untuk model IRS
use App\Models\KHS;                    // Tambahkan import untuk model KHS
use App\Models\MataKuliah; 

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
            $mhs->ip_lalu = $this->hitungIPLalu($mhs->nim); // Menghitung IP Lalu
        }

        // Loop untuk menghitung SKS Diambil dan menentukan Status
        foreach ($mahasiswa as $mhs) {
            // Cek status registrasi di semester_aktif
            $semesterAktif = RiwayatSemesterAktif::where('nim', $mhs->nim)->latest()->first();
            
            if ($semesterAktif) {
                if ($semesterAktif->status == 'Belum Registrasi') {
                    $mhs->status = 'Belum Registrasi';
                    $mhs->sks_diambil = '-';
                } else {
                    // Cek IRS
                    $irs = IRS::where('id_TA', $semesterAktif->id)->where('nim', $mhs->nim)->first();
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

                        // Cek status IRS
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
        $riwayatSemesterAktif = RiwayatSemesterAktif::where('nim', $nim)
            ->latest('tahun_akademik') // Ambil semester terakhir
            ->first();
    
        // Jika tidak ditemukan riwayat semester aktif, kembalikan nilai IP 0
        if (!$riwayatSemesterAktif) {
            return 0; // Tidak ada data semester aktif, IP Lalu 0
        }
    
        // Ambil data IRS yang diambil pada semester terakhir
        $irs = IRS::where('id_riwayat_TA', $riwayatSemesterAktif->id)->get();
    
        // Variabel untuk menghitung total SKS dan total bobot
        $totalSKS = 0;
        $totalBobot = 0;
    
        foreach ($irs as $ir) {
            // Ambil nilai KHS
            $khs = KHS::where('id_irs', $ir->id)->first();
            
            // Pastikan ada nilai KHS yang ditemukan
            if (!$khs) {
                continue; // Skip jika tidak ada nilai KHS untuk IRS ini
            }
    
            // Ambil data mata kuliah
            $matakuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();
            
            // Pastikan ada data mata kuliah
            if (!$matakuliah) {
                continue; // Skip jika tidak ada data mata kuliah untuk IRS ini
            }
    
            // Menentukan bobot berdasarkan nilai KHS
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
    
            // Hitung total SKS dan total bobot
            $totalSKS += $matakuliah->sks;
            $totalBobot += $bobot * $matakuliah->sks;
        }
    
        // Menghitung IP
        return $totalSKS > 0 ? $totalBobot / $totalSKS : 0;
    }
        
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::with('programStudi')->where('nim', $nim)->firstOrFail();

        return view('content.dosen.detailmhs', compact('mahasiswa'));
    }
}
