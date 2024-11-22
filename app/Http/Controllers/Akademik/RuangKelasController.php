<?php

namespace App\Http\Controllers\Akademik;

use App\Models\RuangKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuangKelasController extends Controller
{
    public function index()
    {
        $ruangKelas = RuangKelas::with('program_studi')->get();
        return view('content.akademik.ruangan', compact('ruangKelas'));
    }
}
