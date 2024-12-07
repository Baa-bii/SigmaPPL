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
        $programStudi = ProgramStudi::all(); // Mendapatkan data program studi
        return view('content.kaprodi.matakuliah', compact('dosen', 'programStudi')); // Mengirimkan variabel dosen ke view
    }

    public function store(Request $request)
    {
        $kode_prodi = ProgramStudi::where('kode_prodi', 'INF123')->value('kode_prodi');
        $request->validate([
            'kode_mk' => 'required|string',
            'nama_mk' => 'required|string',
            'semester' => 'required|string',
            'sks' => 'required|integer',
            'jenis_mk' => 'required',
            'kode_prodi' => $kode_prodi,
            'nip_dosen' => 'required|array', 
            'nip_dosen.*' => 'exists:dosen,nip_dosen',
        ]);

        // Simpan mata kuliah terlebih dahulu
        $mataKuliah = MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'jenis_mk' => $request->jenis_mk,
            'kode_prodi' => $kode_prodi,
           
        ]);

        // Simpan relasi ke tabel pivot 

        if ($request->has('nip_dosen') && !empty($request->nip_dosen)) {
            $mataKuliah->dosen()->attach($request->nip_dosen);
        }

        return redirect()->route('kaprodi.mata_kuliah.index')->with('success', 'Mata kuliah berhasil disimpan!');
    }

    public function destroy($kode_mk)
    {
        $mataKuliah = MataKuliah::findOrFail($kode_mk);
        // Debug: Cek jumlah dosen sebelum detach
        // dd($mataKuliah->dosen); // Cek data relasi dosen
        // Menghapus relasi di tabel pivot sebelum menghapus mata kuliah
        $mataKuliah->dosen()->detach();  // Ini akan menghapus relasi di tabel pivot
        // dd($mataKuliah->dosen) ;
        // Sekarang hapus mata kuliah
        $mataKuliah->delete();

        return redirect()->route('kaprodi.mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus!');
    }



};
