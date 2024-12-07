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
    /**
     * Menampilkan halaman dashboard dengan statistik jadwal dan ruang
     */
    public function index(): View
    {
        $jadwal = Jadwal::with([
            'matakuliah:kode_mk,nama_mk',
            'waktu:id,jam_mulai',
            'ruang:id,nama'
        ])->paginate(10);
        
        $ruang = RuangKelas::select('id', 'nama')->get();

        $belum_disetujui = Jadwal::where('status', 'menunggu')->count();
        $sudah_disetujui = Jadwal::where('status', 'disetujui')->count();
        $ditolak = Jadwal::where('status', 'ditolak')->count();

        return view('content.dekan.jadwal', compact('ruang', 'jadwal', 'belum_disetujui', 'sudah_disetujui', 'ditolak'));
    }

    /**
     * Menampilkan daftar ruang kelas
     */
    public function ruang(): View
    {
        $ruang = RuangKelas::paginate(10);

        $belum_disetujui = RuangKelas::where('status', 'menunggu')->count();
        $sudah_disetujui = RuangKelas::where('status', 'disetujui')->count();
        $ditolak = RuangKelas::where('status', 'ditolak')->count();

        return view('content.dekan.ruang', compact('ruang', 'belum_disetujui', 'sudah_disetujui', 'ditolak'));
    }

    /**
     * Menampilkan daftar jadwal
     */
    public function jadwal(): View
    {
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);

        foreach ($jadwal as $item) {
            $jamSelesai = $item->waktu->jam_selesai; // Menggunakan accessor
            echo "Jam Mulai: {$item->waktu->jam_mulai}, Jam Selesai: {$jamSelesai}";
        }

        if ($jadwal->isEmpty()) {
            return view('content.dekan.jadwal', ['message' => 'Tidak ada jadwal yang tersedia.']);
        }

        return view('content.dekan.jadwal', compact('jadwal'));
    }

    /**
     * Menampilkan jadwal yang membutuhkan verifikasi
     */
    public function verifikasijadwal()
    {
        $jadwal = Jadwal::with(['ruang', 'waktu'])->where('status', 'menunggu')->paginate(10);
        return view('content.dekan.verifikasijadwal', compact('jadwal'));
    }

    /**
     * Menampilkan ruang yang terkait dengan jadwal yang menunggu verifikasi
     */
    public function verifikasiruang(): View
    {
        // Ambil data ruang yang memiliki status menunggu
        $ruang = RuangKelas::where('status', 'menunggu')->paginate(10);

        // Cek apakah ada data
        if ($ruang->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada ruang menunggu verifikasi.');
        }

        return view('content.dekan.verifikasiruang', compact('ruang'));
    }

    /**
     * Menampilkan dashboard dengan statistik jadwal dan ruang
     */
    public function dashboard(): View
    {
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);
        $ruang = RuangKelas::with(['jadwal.waktu'])->paginate(10);

        return view('content.dekan.dashboard', compact('jadwal', 'ruang'));
    }

    /**
     * Menampilkan daftar ruang yang digunakan dalam jadwal
     */
    public function showRuangan(): View
    {
        $jadwal = Jadwal::with(['matakuliah', 'waktu', 'ruang'])->paginate(10);
        return view('content.dekan.ruang', compact('jadwal'));
    }

    public function updateStatus(Request $request, $id_jadwal)
{
    try {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        // Temukan jadwal berdasarkan id_jadwal
        $jadwal = Jadwal::findOrFail($id_jadwal);

        // Perbarui status jadwal
        $jadwal->status = $validated['status'];
        $jadwal->save();

        return redirect()->back()->with('success', 'Status jadwal berhasil diperbarui.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function updateRuang(Request $request, $id)
{
    try {
        // Validasi input status
        $validated = $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        // Temukan ruang berdasarkan ID
        $ruang = RuangKelas::findOrFail($id);

        // Perbarui status ruang
        $ruang->status = $validated['status'];
        $ruang->save();

        return redirect()->back()->with('success', 'Status ruang berhasil diperbarui.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Ruang tidak ditemukan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function filterJadwal(Request $request)
{
    // Ambil input pencarian dan filter
    $search = $request->input('search');
    $filter = $request->input('filter'); // Filter status

    // Query jadwal dengan filter berdasarkan pencarian dan status
    $jadwal = Jadwal::with(['matakuliah', 'ruang'])
        ->when($search, function ($query, $search) {
            $query->whereHas('matakuliah', function ($q) use ($search) {
                $q->where('nama_mk', 'LIKE', "%{$search}%");
            });
        })
        ->when($filter, function ($query, $filter) {
            $query->where('status', $filter);
        })
        ->paginate($request->input('per_page', 10));

    // Kirim data ke view
    return view('content.dekan.verifikasijadwal', [
        'jadwal' => $jadwal,
        'filter' => $filter, // Kirim filter yang dipilih
    ]);
}

public function filterRuang(Request $request)
{
    // Ambil input pencarian dan filter
    $search = $request->input('search');
    $filter = $request->input('filter'); // Filter status

    // Query ruang dengan filter berdasarkan pencarian dan status
    $ruang = RuangKelas::with(['jadwal.waktu'])
        ->when($search, function ($query, $search) {
            $query->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('gedung', 'LIKE', "%{$search}%");
        })
        ->when($filter, function ($query, $filter) {
            $query->where('status', $filter);
        })
        ->paginate($request->input('per_page', 10));

    // Kirim data ke view
    return view('content.dekan.verifikasiruang', [
        'ruang' => $ruang,
        'filter' => $filter, // Kirim filter yang dipilih
    ]);
}

public function searchJadwal(Request $request)
{
    // Ambil input pencarian
    $search = $request->input('search');

    // Query jadwal dengan filter berdasarkan search
    $jadwal = Jadwal::with(['matakuliah', 'ruang'])
        ->when($search, function ($query, $search) {
            $query->whereHas('matakuliah', function ($q) use ($search) {
                $q->where('nama_mk', 'LIKE', "%{$search}%");
            });
        })
        ->paginate($request->input('per_page', 10));

    // Kirim data ke view
    return view('content.dekan.verifikasijadwal', compact('jadwal'));
}

public function searchRuang(Request $request)
{
    // Ambil input pencarian
    $search = $request->input('search');

    // Query ruang dengan filter berdasarkan pencarian
    $ruang = RuangKelas::with(['jadwal.waktu'])
        ->when($search, function ($query, $search) {
            $query->where('nama', 'LIKE', "%{$search}%");
        })
        ->paginate($request->input('per_page', 10)); // Tambahkan paginasi jika diperlukan

    // Kirim data ke view
    return view('content.dekan.verifikasiruang', compact('ruang'));
}

public function bulkUpdate(Request $request)
{
    // Validasi input
    $ids = $request->input('ids', []);
    $status = $request->input('status', '');

    if (empty($ids) || !in_array($status, ['disetujui', 'ditolak'])) {
        return response()->json(['message' => 'Data atau status tidak valid.'], 400);
    }

    // Update status
    Jadwal::whereIn('id_jadwal', $ids)->update(['status' => $status]);

    return response()->json(['message' => 'Status berhasil diperbarui.']);
}

public function buildUpdate(Request $request)
{
    // Validasi input
    $ids = $request->input('ids', []);
    $status = $request->input('status', '');

    if (empty($ids) || !in_array($status, ['disetujui', 'ditolak'])) {
        return response()->json(['message' => 'Data atau status tidak valid.'], 400);
    }

    // Update status
    RuangKelas::whereIn('id', $ids)->update(['status' => $status]);

    return response()->json(['message' => 'Status berhasil diperbarui.']);
}

}
