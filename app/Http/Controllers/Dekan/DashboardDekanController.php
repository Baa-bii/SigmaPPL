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
    public function index(): View
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data dosen terkait user
        $dekan = $user->dekan; // Pastikan relasi `dekan` ada di model User

        // Fetch all RuangKelas records
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        // Ambil data jadwal dengan relasi
        $ruangan = RuangKelas::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        // Menghitung jumlah status
        $belum_disetujui = Jadwal::where('status', 'menunggu')->count();
        $sudah_disetujui = Jadwal::where('status', 'disetujui')->count();
        $ditolak = Jadwal::where('status', 'ditolak')->count();

        $belum_disetujui = RuangKelas::where('status', 'menunggu')->count();
        $sudah_disetujui = RuangKelas::where('status', 'disetujui')->count();
        $ditolak = RuangKelas::where('status', 'ditolak')->count();

        // Kirim data ke view
        return view('content.dekan.jadwal', 'content.dekan.ruang', compact('ruangan', 'jadwal', 'belum_disetujui', 'sudah_disetujui', 'ditolak'));
    }

    public function ruang()
{
    $ruangan = RuangKelas::all(); // Ambil semua data ruang
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

    public function verifikasiRuang()
{
    // Logika untuk menampilkan halaman verifikasi ruang
    $ruangan = RuangKelas::where('status', 'menunggu')->paginate(10);

    // Kirim data ke view
    return view('content.dekan.verifikasiruang', compact('jadwal'));
}


    public function dashboard()
    {
        // Ambil data jadwal (opsional untuk bagian lain di view)
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        // Kirim data ke view
        return view('content.dekan.dashboard', compact('jadwal'));
    }

    public function showRuangan()
    {
        // Ambil data jadwal, ruang kelas, mata kuliah, dan waktu
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        return view('content.dekan.ruang', compact('jadwal'));
    }

    public function updateStatus(Request $request, $id)
{
    // Validasi input status
    $validated = $request->validate([
        'status' => 'required|in:disetujui,ditolak',
    ]);

    // Cari jadwal berdasarkan ID
    $jadwal = Jadwal::findOrFail($id);

    // Perbarui status
    $jadwal->status = $validated['status'];
    $jadwal->save();

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('dekan.verifikasijadwal')->with('success', 'Status berhasil diperbarui!');
}

    public function filterJadwal(Request $request)
{
    // Validasi input
    $validator = \Validator::make($request->all(), [
        'prodi' => 'required|string',
        'semester' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Ambil input dari request
    $prodi = $request->input('prodi');
    $semester = $request->input('semester');

    // Query Jadwal dengan filter
    $jadwal = Jadwal::with([
        'matakuliah' => function ($query) {
            $query->select('kode_mk', 'nama_mk', 'kode_prodi', 'semester');
        },
        'waktu' => function ($query) {
            $query->select('id', 'jam_mulai', 'jam_selesai', 'tanggal');
        },
        'ruang' => function ($query) {
            $query->select('id', 'nama', 'gedung', 'kapasitas', 'kode_prodi');
        }
    ])
    ->whereHas('matakuliah', function ($query) use ($prodi, $semester) {
        $query->where('kode_prodi', $prodi) // Filter program studi
              ->where('semester', $semester); // Filter semester
    })
    ->paginate(10);

    // Format hasil untuk response JSON
    return response()->json([
        'jadwal' => $jadwal->items(),
        'pagination' => [
            'current_page' => $jadwal->currentPage(),
            'last_page' => $jadwal->lastPage(),
            'per_page' => $jadwal->perPage(),
            'total' => $jadwal->total(),
        ],
    ]);
}

}