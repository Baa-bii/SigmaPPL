<?php
namespace App\Http\Controllers\kaprodi;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Http\Controllers\Controller;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('dosen', 'dosenmatkul')->get();
        $dosen = Dosen::all(); // Pastikan ini ditambahkan
        $programStudi = ProgramStudi::all(); // Pastikan ini ditambahkan
        // $mataKuliah = MataKuliah::with(['dosenMatkul.dosen'])->get();

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

        return redirect()->route('kaprodi.mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    public function destroy($kode_mk)
    {
        // Log::info('Kode MK yang diterima untuk dihapus:', ['kode_mk' => $kode_mk]);
        
        $mataKuliah = MataKuliah::where('kode_mk', $kode_mk)->firstOrFail();
        // Log::info('Mata kuliah yang ditemukan:', $mataKuliah->toArray());

        $mataKuliah->dosen()->detach();
        $mataKuliah->delete();

        // Log::info('Mata kuliah berhasil dihapus:', ['kode_mk' => $kode_mk]);

        return redirect()->route('kaprodi.mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus!');
    }
    public function update(Request $request, $kode_mk)
{
    $request->validate([
        'kode_mk' => 'required|string',
        'nama_mk' => 'required|string',
        'semester' => 'required|string',
        'sks' => 'required|integer',
        'jenis_mk' => 'required',
        'nip_dosen' => 'required|array',
        'nip_dosen.*' => 'exists:dosen,nip_dosen',
    ]);

    // Cek apakah kode_mk baru ada di matakuliah
    $newKodeMkExists = MataKuliah::where('kode_mk', $request->kode_mk)->exists();

    if (!$newKodeMkExists) {
        return redirect()->back()->with('error', 'Kode MK baru tidak ditemukan di tabel matakuliah.');
    }

    $mataKuliah = MataKuliah::where('kode_mk', $kode_mk)->firstOrFail();

    // Update kode_mk di tabel dosenmatkul
    DB::table('dosenmatkul')->where('kode_mk', $mataKuliah->kode_mk)
                            ->update(['kode_mk' => $request->kode_mk]);

    // Update tabel matakuliah
    $mataKuliah->update([
        'kode_mk' => $request->kode_mk,
        'nama_mk' => $request->nama_mk,
        'semester' => $request->semester,
        'sks' => $request->sks,
        'jenis_mk' => $request->jenis_mk,
    ]);

    // Update relasi dosen
    if ($request->has('nip_dosen') && !empty($request->nip_dosen)) {
        $mataKuliah->dosen()->sync($request->nip_dosen);
    }

    return redirect()->route('kaprodi.mata_kuliah.index')->with('success', 'Mata kuliah berhasil diperbarui!');
}
public function showMataKuliah($kode_mk)
{
    // Mengambil mata kuliah berdasarkan kode_mk
    $mataKuliah = MataKuliah::with(['dosenmatkul.dosen'])->where('kode_mk', $kode_mk)->first();

    // Menyiapkan data untuk ditampilkan di view
    return view('mata_kuliah.show', compact('mataKuliah'));
}









};
