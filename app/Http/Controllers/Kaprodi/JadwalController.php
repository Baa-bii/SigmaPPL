<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Waktu;
use App\Models\RuangKelas;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\SemesterAktif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    public function index()
    {
        // Ambil data jadwal beserta relasinya
        // $jadwal = Jadwal::with(['waktu', 'ruang', 'matakuliah', 'programStudi', 'semesterAktif'])->get();
        $jadwal = Jadwal::whereHas('semesterAktif', function ($query) {
            $query->where('semester', 0)
                  ->orWhereRaw('semester % 2 = 1'); // Hanya yang is_active = true
        })->get();
    
        // Mengambil data semester aktif (tahun akademik)
        // $tahunAjaran = SemesterAktif::orderBy('tahun_akademik', 'desc')->first();
        $tahunAjaran = SemesterAktif::where('is_active',true)->value('tahun_akademik');  
    
        // Mendapatkan semua data lainnya
        $programStudi = ProgramStudi::where('kode_prodi', 'INF123')->first();
        $matakuliah = MataKuliah::all();
        $ruang = RuangKelas::all();
        $waktu = Waktu::all();
    
        // Menghitung jam_selesai untuk setiap jadwal
        foreach ($jadwal as $item) {
            $item->jam_selesai = $this->hitungJamSelesai($item->waktu->id, $item->matakuliah->kode_mk);
        }
    
        return view('content.kaprodi.jadwal', compact('jadwal', 'tahunAjaran', 'programStudi', 'matakuliah', 'ruang', 'waktu'));
    }
    
    public function hitungJamSelesai($id_waktu, $kodeMK)
    {
        $waktuMulai = Waktu::find($id_waktu);
        $matakuliah = MataKuliah::where('kode_mk', $kodeMK)->first();
        $sks = $matakuliah->sks;
        $jamMulaiArray = explode(':', $waktuMulai->jam_mulai);
        $jamMulaiMinutes = ($jamMulaiArray[0] * 60) + $jamMulaiArray[1];
        $jamSelesaiMinutes = $jamMulaiMinutes + ($sks * 50);  // Anggap SKS = 50 menit per SKS
        $jamSelesai = floor($jamSelesaiMinutes / 60) . ':' . str_pad($jamSelesaiMinutes % 60, 2, '0', STR_PAD_LEFT);
        
        return $jamSelesai;
    }

    public function create()
    {
        $waktu = Waktu::all();
        $ruang = RuangKelas::all();
        $matakuliah = MataKuliah::all(); // Ambil semua mata kuliah
        $programStudi = ProgramStudi::where('kode_prodi', 'INF123')->first();
        $semesterAktif = SemesterAktif::all();
        $tahunAjaran = SemesterAktif::where('is_active',true)->value('tahun_akademik');

        // Mengirimkan data SKS bersama dengan mata kuliah
        return view('content.kaprodi.jadwal', compact('waktu', 'ruang', 'matakuliah', 'programStudi', 'semesterAktif', 'tahunAjaran', 'tahunAkademik'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_mk' => 'required|string',
            'jumlah_kelas' => 'required|integer',
            'kelas.*.id_jadwal' => 'required|string', // Validasi untuk ID jadwal yang unik
            'kelas.*.hari' => 'required|string',
            'kelas.*.kelas' => 'required|string',
            'kelas.*.id_ruang' => 'required|integer',
            'kelas.*.id_waktu' => 'required|integer',
        ]);
        
        // dd($request->all());
        Log::info('Data yang diterima: ', $request->all());


        // Menyimpan data jadwal
        $id_TA = SemesterAktif::where('is_active', true)->value('id');
        $kode_prodi = ProgramStudi::where('kode_prodi', 'INF123')->value('kode_prodi');

        try {
            foreach ($request->input('kelas') as $kelas) {
                Jadwal::create([
                    'id_jadwal' => $kelas['id_jadwal'],
                    'kode_mk' => $request->input('kode_mk'),
                    'id_TA' => $id_TA,
                    'kode_prodi' => $kode_prodi,
                    'hari' => $kelas['hari'],
                    'id_ruang' => $kelas['id_ruang'],
                    'id_waktu' => $kelas['id_waktu'],
                    'kelas' => $kelas['kelas'],
                ]);
            }
            
            Log::info('Data berhasil disimpan ke database');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data', ['message' => $e->getMessage()]);
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }

        return redirect()->route('kaprodi.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $waktu = Waktu::all();
        $ruang = RuangKelas::all();
        $matakuliah = MataKuliah::all();
        $programStudi = ProgramStudi::all();
        $semesterAktif = SemesterAktif::all();

        return view('content.kaprodi.jadwal.edit', compact('jadwal', 'waktu', 'ruang', 'matakuliah', 'programStudi', 'semesterAktif'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hari' => 'required|string',
            'kelas' => 'required|string',
            'id_waktu' => 'required|exists:waktu,id',
            'id_TA' => 'required|exists:semester_aktif,id',
            'id_ruang' => 'required|exists:ruang,id',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'kode_prodi' => 'required|exists:program_studi,kode_prodi',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('content.kaprodi.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('content.kaprodi.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
