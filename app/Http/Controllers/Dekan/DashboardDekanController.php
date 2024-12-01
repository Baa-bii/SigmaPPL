<?php

namespace App\Http\Controllers\Dekan;

use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\MataKuliah;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

/**
 * Controller untuk mengelola semua fitur pada Dashboard Dekan
 * - Menampilkan halaman terkait jadwal, ruang, dan verifikasi
 * - Menangani proses filter jadwal dan pembaruan status
 */
class DashboardDekanController extends Controller
{
    // Fungsi untuk rendering views
    // Dalam Controller
    public function index(): View
    {
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);
        $ruang = RuangKelas::all();

        $belum_disetujui = Jadwal::where('status', 'menunggu')->count();
        $sudah_disetujui = Jadwal::where('status', 'disetujui')->count();
        $ditolak = Jadwal::where('status', 'ditolak')->count();

        return view('content.dekan.jadwal', compact('ruang', 'jadwal', 'belum_disetujui', 'sudah_disetujui', 'ditolak'));
    }

    // Jika ada route lain yang membutuhkan $ruang
    public function ruang(): View
    {
        $ruang = RuangKelas::paginate(10);

        $belum_disetujui = RuangKelas::where('status', 'menunggu')->count();
        $sudah_disetujui = RuangKelas::where('status', 'disetujui')->count();
        $ditolak = RuangKelas::where('status', 'ditolak')->count();

        return view('content.dekan.ruang', compact('ruang', 'belum_disetujui', 'sudah_disetujui', 'ditolak'));
    }

public function jadwal(): View
{
    // Ambil data jadwal dengan relasi eager loading
    $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

    return view('content.dekan.jadwal', compact('jadwal'));
}

public function verifikasijadwal(): View
{
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])
            ->where('status', 'menunggu')
            ->paginate(10); // Gunakan paginate untuk konsistensi

        return view('content.dekan.verifikasijadwal', compact('jadwal'));
}

public function verifikasiruang(): View
{
    // Ambil data jadwal dengan status 'menunggu' beserta relasi 'ruang'
    $ruang = RuangKelas::with(['jadwal.matakuliah', 'jadwal.waktu'])
        ->whereHas('jadwal', function ($query) {
            $query->where('status', 'menunggu');
        })
        ->paginate(10);

    return view('content.dekan.verifikasiruang', compact('ruang'));
}

    public function dashboard()
    {
        // Ambil data jadwal (opsional untuk bagian lain di view)
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);
        $ruang = RuangKelas::with(['jadwal.waktu'])->paginate(10);

        // Kirim data ke view
        return view('content.dekan.dashboard', compact('jadwal', 'ruang'));
    }

    public function showRuangan()
    {
        // Ambil data jadwal, ruang kelas, mata kuliah, dan waktu
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        return view('content.dekan.ruang', compact('jadwal'));
    }

    public function updateStatus(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'status' => 'required|in:disetujui,ditolak',
    ]);

    // Cari jadwal berdasarkan ID
    $jadwal = Jadwal::findOrFail($id);
    $ruang = RuangKelas::findOrFail($id);

    // Perbarui status jadwal
    $jadwal = Jadwal::findOrFail($id);
    $ruang = $jadwal->ruang; // Mengakses ruang terkait dari jadwal

    $jadwal->status = $validated['status'];
    $jadwal->save();

    if ($ruang) {
        $ruang->status = $validated['status'];
        $ruang->save();
    }

    // Redirect ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}

public function filterJadwal(Request $request)
{
    $prodi = $request->input('prodi');
    $semester = $request->input('semester');

    // Simpan filter ke session
    session(['filter_prodi' => $prodi, 'filter_semester' => $semester]);

    $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])
        ->whereHas('matakuliah', function ($query) use ($prodi, $semester) {
            $query->where('kode_prodi', $prodi)
                  ->where('semester', $semester);
        })
        ->paginate(10);

    return view('content.dekan.verifikasijadwal', compact('jadwal', 'prodi', 'semester'));
}

}