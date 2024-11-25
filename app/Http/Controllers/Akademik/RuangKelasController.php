<?php

namespace App\Http\Controllers\Akademik;

use App\Models\RuangKelas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuangKelasController extends Controller
{
    public function index()
    {
        $ruangKelas = RuangKelas::with('program_studi')->get();
        $programStudi = ProgramStudi::all();
        return view('content.akademik.ruangan', compact('ruangKelas', 'programStudi'));
    }

    public function create()
    {
        $programStudi = ProgramStudi::all();
        return view('content.akademik.createruang', compact('programStudi'));
    }

    public function edit(RuangKelas $ruangKelas)
    {
        $programStudi = ProgramStudi::all();
        return view('content.akademik.editruang', compact('ruangKelas', 'programStudi'));
    }

    
}
