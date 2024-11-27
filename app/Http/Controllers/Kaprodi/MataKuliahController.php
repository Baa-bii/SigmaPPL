<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(){
        $mataKuliah = MataKuliah::with('dosen')->get();
        return view('kaprodi.matakuliah', compact('mataKuliah'));
    }


    public function create()
    {
        $dosen = Dosen::all();
        return view('kaprodi.matakuliah', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|string',
            'nama_mk' => 'required|string',
            'semester' => 'required|string',
            'sks' => 'required|integer',
            'jenis_mk' => 'required',
            'nip_dosen' => 'required|array', 
            'rombel_kelas' => 'required|integer',
        ]);

        // Simpan mata kuliah terlebih dahulu
        $mataKuliah = MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'jenis_mk' => $request->jenis_mk,
            'rombel_kelas' => $request->rombel_kelas,
        ]);

       
        // Simpan relasi ke tabel pivot
        $mataKuliah->dosen()->attach($request->nip_dosen);

        return redirect()->route('kaprodi.matakuliah')->with('success', 'Mata kuliah berhasil disimpan!');
    }
};
