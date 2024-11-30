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

class JadwalController extends Controller
{
    public function index()
    {
        // Ambil data jadwal beserta relasinya

        $jadwal = Jadwal::with(['waktu', 'ruang', 'matakuliah', 'programStudi', 'semesterAktif'])->get();
        $tahunAjaran = SemesterAktif::orderBy('tahun_akademik', 'desc')->first(); // Tambahkan ini
        $programStudi = ProgramStudi::where('kode_prodi', 'INF123')->first();
        $matakuliah = MataKuliah::all();
        $ruang = RuangKelas::all();
        $waktu = Waktu::all();
         // Debugging untuk memastikan data jadwal tersedia
        // dd($jadwal);
        // Kirim data jadwal ke view
        return view('content.kaprodi.jadwal', compact('jadwal','tahunAjaran', 'programStudi', 'matakuliah', 'ruang', 'waktu'));
    }


    public function create()
    {
        $waktu = Waktu::all();
        $ruang = RuangKelas::all();
        $matakuliah = MataKuliah::all();
        $programStudi = ProgramStudi::where('kode_prodi', 'INF123')->first();
        $semesterAktif = SemesterAktif::all();
        $tahunAjaran = SemesterAktif::orderBy('tahun_akademik', 'desc')->first();
        return view('content.kaprodi.jadwal', compact('waktu', 'ruang', 'matakuliah', 'programStudi', 'semesterAktif', 'tahunAjaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'id_TA' => 'required|exists:semester_aktif,id',
            'kode_prodi' => 'required|exists:program_studi,kode_prodi',
            'kelas.*.hari' => 'required|string',
            'kelas.*.id_ruang' => 'required|exists:ruang,id',
            'kelas.*.jam_mulai' => 'required',
            'kelas.*.jam_selesai' => 'required',
        ]);
        $request->validate([
            'kelas.*.hari' => 'required|string',
            'kelas.*.id_ruang' => 'required|exists:ruang,id',
            'kelas.*.jam_mulai' => 'required',
            'kelas.*.jam_selesai' => 'required',
        ]);

        foreach ($request->input('kelas') as $kelas) {
            Jadwal::create([
                'kode_mk' => $request->kode_mk,
                'id_TA' => $request->id_TA,
                'kode_prodi' => $request->kode_prodi,
                'hari' => $kelas['hari'],
                'id_ruang' => $kelas['id_ruang'],
                'jam_mulai' => $kelas['jam_mulai'],
                'jam_selesai' => $kelas['jam_selesai'],
            ]);
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
