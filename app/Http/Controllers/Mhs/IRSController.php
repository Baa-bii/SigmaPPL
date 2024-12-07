
// namespace App\Http\Controllers\mhs;

// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
// use App\Models\SemesterAktif;
// use App\Models\Mahasiswa;
// use App\Models\IRS;
// use App\Models\MataKuliah;

// class IRSController extends Controller
// {
//     public function index()
//     {
//         dd('Masuk ke method index');
//         $user = Auth::user();
//         $mhs = $user->mahasiswa;

//         if (!$mhs) {
//             return redirect()->route('mhs.dashboard.index')->with('error', 'Data mahasiswa tidak ditemukan.');
//         }

//         // Panggil fungsi untuk mendapatkan data mahasiswa dan semester aktif
//         return $this->show($mhs->nim); 
//     }

//     private function show($nim)
//     {
//         // Ambil data mahasiswa beserta program studi yang terkait
//         $mahasiswa = Mahasiswa::with('programStudi')->where('nim', $nim)->firstOrFail();

//         // Ambil data semester aktif berdasarkan NIM mahasiswa
//         $semesterAktif = SemesterAktif::where('nim', $nim)
//             ->where('is_active', 1) // Pastikan semester aktif
//             ->first(); // Ambil yang pertama atau yang terbaru

//         // Jika data semester aktif tidak ditemukan, set nilai default
//         $tahunAkademik = $semesterAktif ? $semesterAktif->tahun_akademik : 'Not Found';
//         $semester = $semesterAktif ? $semesterAktif->semester : 'Not Found';


//         // Panggil fungsi private untuk mendapatkan data semester aktif dan status IRS untuk accordion
//         list($semesterAktifData, $hasIRS) = $this->accordionData($nim);
//         dd($semesterAktifData);
//         // Kirim data ke view
//         return view('content.mhs.irs', compact(
//             'mahasiswa', 
//             'tahunAkademik', 
//             'semester', 
//             'ips', 
//             'ipk', 
//             'ipsData', 
//             'ipkData', 
//             'maxBebanSKSData', 
//             'semesterAktifData', 
//             'hasIRS'
//         ));
//     }

//     private function accordionData($nim)
// {
//     $semesterAktif = SemesterAktif::where('nim', $nim)
//         ->orderBy('tahun_akademik', 'asc')
//         ->get();
//     dd($semesterAktif); 
//     $semesterTerbaru = $semesterAktif->firstWhere('is_active', 1);

//     // Cek apakah semester terbaru sudah memiliki IRS
//     $hasIRS = false;
//     $semesterAktifData = []; // Menyimpan data semester aktif dengan jumlah SKS

//     if ($semesterTerbaru) {
//         $hasIRS = IRS::where('id_TA', $semesterTerbaru->id)->exists();
//     }

//     foreach ($semesterAktif as $semester) {
//         $irs = IRS::with([
//             'matakuliah', 
//             'jadwal', 
//             'jadwal.ruang', 
//             'jadwal.waktu',
//             'matakuliah.dosen'
//         ])
//         ->where('id_TA', $semester->id)
//         ->get();
//         dd($irs);    
//         // Hitung total SKS untuk semester ini
//         $totalSKS = 0;
//         foreach ($irs as $ir) {
//             $mataKuliah = MataKuliah::where('kode_mk', $ir->kode_mk)->first();
//             if ($mataKuliah) {
//                 $totalSKS += $mataKuliah->sks;
//             }
//         }

//         // Ambil status IRS dari tabel IRS untuk semester ini
//         $statusIRS = $irs->pluck('status')->first(); // Ambil status dari IRS pertama

//         // Menambahkan data IRS dan status ke semester aktif
//         $semester->irsData = $irs;
//         $semester->statusIRS = $statusIRS ?? 'Belum Disetujui';

//         // Tambahkan data semester dan jumlah SKS ke array
//         $semester->jumlah_sks = $totalSKS;
//         $semesterAktifData[] = $semester;
//     }

//     return [$semesterAktifData, $hasIRS];
// }

// }
