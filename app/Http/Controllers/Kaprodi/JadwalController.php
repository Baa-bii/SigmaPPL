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
use Illuminate\Support\Str;
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
        $statusJadwal = Jadwal::where('id_jadwal', 'JDWPBPB')->value('status'); 

        // Mengambil data semester aktif (tahun akademik)
        // $tahunAjaran = SemesterAktif::orderBy('tahun_akademik', 'desc')->first();
        $tahunAjaran = SemesterAktif::where('is_active',true)->value('tahun_akademik');  
    
        // Mendapatkan semua data lainnya
        $programStudi = ProgramStudi::where('kode_prodi', 'INF123')->first();
        $matakuliah = MataKuliah::all();
        // $ruang = RuangKelas::all();
        $ruang = RuangKelas::where('status', 'disetujui')->get();
        $waktu = Waktu::all();
    
        // Menghitung jam_selesai untuk setiap jadwal
        foreach ($jadwal as $item) {
            $item->jam_selesai = $this->hitungJamSelesai($item->waktu->id, $item->matakuliah->kode_mk);
        }
    
        return view('content.kaprodi.jadwal', compact('jadwal', 'tahunAjaran', 'programStudi', 'matakuliah', 'ruang', 'waktu', 'statusJadwal'));
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
        return view('content.kaprodi.jadwal', compact('waktu', 'ruang', 'matakuliah', 'programStudi', 'semesterAktif', 'tahunAjaran'));
    }

    // Fungsi untuk memeriksa apakah ada bentrok jadwal
    public function isJadwalBentrok($hari, $id_waktu, $id_ruang, $kelas, $jamMulai, $jamSelesai, $jadwalTerdaftar)
{
    Log::info("Cek bentrok: {$hari}, {$id_waktu}, {$id_ruang}, {$kelas}, Jam Mulai: {$jamMulai}, Jam Selesai: {$jamSelesai}");
    
    // Ambil jadwal yang terdaftar pada hari yang sama dengan semester ganjil
    $jadwalPadaHariYangSama = $jadwalTerdaftar->where('hari', $hari)
        ->filter(function ($jadwal) {
            // Cek semester ganjil melalui relasi ke semester_aktif
            $semester = SemesterAktif::where('id', $jadwal->id_TA)->value('semester');
            return $semester % 2 == 1; // Hanya semester ganjil
        });

    foreach ($jadwalPadaHariYangSama as $jadwal) {
        // Cek bentrok berdasarkan ruang dan waktu mulai
        if ($jadwal['id_ruang'] === $id_ruang && $jadwal['id_waktu'] === $id_waktu) {
            return "Bentrok: Ruang {$id_ruang} pada hari {$hari} jam {$id_waktu}.";
        }

        // Cek tumpang tindih berdasarkan waktu
        $jamSelesaiTerdaftar = $jadwal['id_waktu'] + 1; // Asumsi 1 jam untuk setiap waktu
        if (($jamMulai >= $jadwal['id_waktu'] && $jamMulai < $jamSelesaiTerdaftar) || 
            ($jamSelesai > $jadwal['id_waktu'] && $jamSelesai <= $jamSelesaiTerdaftar)) {
            return "Bentrok: Mata kuliah tumpang tindih dengan jadwal {$jadwal['id_jadwal']} pada hari {$hari}.";
        }
    }

    return false; // Tidak ada bentrok
}

    


    public function store(Request $request)
{
    Log::info('Data yang dikirim:', $request->all());

   
    // Validasi input
    $request->validate([
        'kode_mk' => 'required|string',
        'jumlah_kelas' => 'required|integer',
        'kelas.*.id_jadwal' => 'required|string|unique:jadwal,id_jadwal', // Validasi ID unik
        'kelas.*.hari' => 'required|string',
        'kelas.*.kelas' => 'required|string',
        'kelas.*.id_ruang' => 'required|integer',
        'kelas.*.id_waktu' => 'required|integer',
    ]);

     // Ambil data jadwal yang sudah ada pada semester ganjil
     $jadwalTerdaftar = Jadwal::whereHas('semesterAktif', function ($query) {
        $query->whereRaw('semester % 2 = 1'); // Filter semester ganjil
    })->get();
    
    // Loop untuk memeriksa setiap kelas dan memastikan tidak ada bentrok
    foreach ($request->input('kelas') as $kelas) {
        Log::info('Menyimpan data jadwal dengan id_jadwal:', ['id_jadwal' => $kelas['id_jadwal']]);

        // Ambil waktu mulai dan selesai dari jadwal yang dikirimkan
        $jamMulai = $kelas['id_waktu']; // Asumsi jam mulai berdasarkan id_waktu
        $jamSelesai = $jamMulai + 1; // Asumsi setiap jadwal berlangsung 1 jam, jika lebih sesuaikan
        
        // Cek bentrok
        $bentrokMessage = $this->isJadwalBentrok($kelas['hari'], $kelas['id_waktu'], $kelas['id_ruang'], $kelas['kelas'], $jamMulai, $jamSelesai, $jadwalTerdaftar);
        
        // Jika ada bentrok, kirim pesan error dan hentikan eksekusi
        if ($bentrokMessage) {
            Log::info('Terjadi bentrok:', ['message' => $bentrokMessage]);
            return back()->withErrors(['error' => $bentrokMessage]); // Menambahkan key error di dalam array
        }
    }

    // Menyimpan data jadwal
    $id_TA = SemesterAktif::where('is_active', true)->value('id');
    $kode_prodi = ProgramStudi::where('kode_prodi', 'INF123')->value('kode_prodi');
    
    try {
        foreach ($request->input('kelas') as $kelas) {
            $id_jadwal = $kelas['id_jadwal'] ?? (string) Str::uuid(); // Menggunakan UUID jika id_jadwal kosong
            Jadwal::create([
                'id_jadwal' => $id_jadwal,
                'kode_mk' => $request->input('kode_mk'),
                'id_TA' => $id_TA,
                'kode_prodi' => $kode_prodi,
                'hari' => $kelas['hari'],
                'id_ruang' => $kelas['id_ruang'],
                'id_waktu' => $kelas['id_waktu'],
                'kelas' => $kelas['kelas'],
            ]);
        }
        Log::info('berhasil Menyimpan data jadwal', ['kelas' => $kelas]);

        Log::info('Data berhasil disimpan ke database');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan data', ['message' => $e->getMessage()]);
        Log::info('gagal Menyimpan data jadwal', ['kelas' => $kelas]);

        return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
    }

    return redirect()->route('kaprodi.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
}


public function edit($id_jadwal)
{
    // Ambil jadwal yang ingin diedit berdasarkan ID
    $jadwal = Jadwal::findOrFail($id_jadwal);
    $waktu = Waktu::all();
    $ruang = RuangKelas::all();
    $matakuliah = MataKuliah::all();

    return view('content.kaprodi.jadwal', compact('jadwal', 'waktu', 'ruang', 'matakuliah'));
}




public function update(Request $request, $id_jadwal)
{
    // Validasi data dari form
    $validated = $request->validate([
        'kode_mk' => 'required|exists:matakuliah,kode_mk',
        'id_jadwal' => 'required|string',
        'kelas' => 'required|string',
        'hari' => 'required|string',
        'id_ruang' => 'required|exists:ruang,id',
        'id_waktu' => 'required|exists:waktu,id',
    ]);

    // Cari jadwal berdasarkan ID
    $jadwal = Jadwal::findOrFail($id_jadwal);

    // Update jadwal dengan data baru
    $jadwal->update($validated);

    return redirect()->route('kaprodi.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
}




    public function destroy($id_jadwal)
    {
        $jadwal= Jadwal::where('id_jadwal', $id_jadwal)->firstOrFail();
        // $jadwal = Jadwal::findOrFail($id_jadwal);
        $jadwal->delete();

        return redirect()->route('kaprodi.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function ajukan()
    {
        // Update semua jadwal menjadi diajukan
        \App\Models\Jadwal::where('status', 'menunggu')->update(['status' => 'diajukan']);

        // Redirect dengan pesan sukses
        return redirect()->route('kaprodi.jadwal.index')->with('success', 'Semua jadwal berhasil diajukan.');
    }
    

}
