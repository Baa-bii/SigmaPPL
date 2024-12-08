<?php

namespace App\Http\Controllers\Mhs;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class irsSementaraController extends Controller
{
    public function index() {
        $irsData = DB::table('irs')
            ->join('semester_aktif', 'irs.id_TA', '=', 'semester_aktif.id')
            ->join('jadwal', 'irs.id_jadwal', '=', 'jadwal.id_jadwal')
            ->join('matakuliah', 'irs.kode_mk', '=', 'matakuliah.kode_mk')
            ->select('irs.id', 'matakuliah.kode_mk', 'matakuliah.nama_mk as mata_kuliah', 'semester_aktif.semester', 'jadwal.kelas', 'jadwal.ruang', 'matakuliah.sks')
            ->get();
        return view('irs', compact('irsData'));
    }
    
}