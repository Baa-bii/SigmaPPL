<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\View\View;
use App\Models\RuangKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardAkademikController extends Controller
{
    public function index(): View{
         // Ambil jumlah ruang berdasarkan prodi
         $prodiCounts = RuangKelas::with('program_studi')
         ->select('kode_prodi', DB::raw('count(*) as total'))
         ->groupBy('kode_prodi')
         ->get();
         
        return view('content.akademik.dashboard', compact('prodiCounts'));
    }
    
}
