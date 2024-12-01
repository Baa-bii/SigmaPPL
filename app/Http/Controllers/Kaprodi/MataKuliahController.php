<?php
namespace App\Http\Controllers\kaprodi;

use Illuminate\Support\Facades\Log;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Http\Controllers\Controller;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('dosen')->get();
        $dosen = Dosen::all(); // Pastikan ini ditambahkan
        $programStudi = ProgramStudi::all(); // Pastikan ini ditambahkan
        return view('content.kaprodi.matakuliah', compact('mataKuliah', 'dosen', 'programStudi')); // Mengirimkan dosen
    }

    public function create()
    {
        $dosen = Dosen::all(); // Mendapatkan data dosen
        return view('content.kaprodi.matakuliah', compact('dosen')); // Mengirimkan variabel dosen ke view
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
            
        ]);

        // Simpan mata kuliah terlebih dahulu
        $mataKuliah = MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'jenis_mk' => $request->jenis_mk,
           
        ]);

       
        // Simpan relasi ke tabel pivot
        $mataKuliah->dosen()->attach($request->nip_dosen);

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil disimpan!');
    }
};
