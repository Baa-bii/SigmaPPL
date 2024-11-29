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

class DashboardDekanController extends Controller
{
    public function index(): View
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data dosen terkait user
        $dekan = $user->dekan; // Pastikan relasi `dekan` ada di model User

        // Fetch all RuangKelas records
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);
        return view('content.dekan.jadwal', compact('jadwal'));
    }

    public function ruang()
    {
        $ruangan = RuangKelas::all();
        return view('content.dekan.ruang', compact('ruangan'));
    }

    public function jadwal(): View
    {
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);  // Eager load the relationships
        return view('content.dekan.jadwal', compact('jadwal'));
    }

    public function verifikasijadwal(): View
    {
        // Mengambil data jadwal dengan status 'menunggu' beserta relasi 'matakuliah', 'waktu', dan 'ruang'
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])
            ->where('status', 'menunggu')
            ->paginate(10);

        return view('content.dekan.verifikasijadwal', compact('jadwal'));
    }

    public function dashboard()
    {
        $belum_disetujui = Jadwal::where('status', 'menunggu')->count();
        $sudah_disetujui = Jadwal::where('status', 'disetujui')->count();
        $ditolak = Jadwal::where('status', 'ditolak')->count();

        // Ambil data jadwal (opsional untuk bagian lain di view)
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        // Kirim data ke view
        return view('content.dekan.dashboard', compact('belum_disetujui', 'sudah_disetujui', 'ditolak', 'jadwal'));
    }

    public function showRuangan()
    {
        // Ambil data jadwal, ruang kelas, mata kuliah, dan waktu
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        return view('content.dekan.ruang', compact('jadwal'));
    }

    public function updateStatus(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:disetujui,ditolak',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->status = $validated['status'];
    $jadwal->save();

    return redirect()->route('dekan.verifikasijadwal')->with('success', 'Status berhasil diperbarui!');
}

}