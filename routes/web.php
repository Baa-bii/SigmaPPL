<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dosen\PerwalianController;
use App\Http\Controllers\Mhs\DashboardMhsController;
use App\Http\Controllers\Akademik\RuangKelasController;
use App\Http\Controllers\Dekan\DashboardDekanController;
use App\Http\Controllers\Dosen\DashboardDosenController;
use App\Http\Controllers\Dosen\CetakIrsController;
use App\Http\Controllers\Kaprodi\DashboardKaprodiController;
use App\Http\Controllers\Kaprodi\MataKuliahController;
use App\Http\Controllers\Kaprodi\JadwalController;
use App\Http\Controllers\Akademik\DashboardAkademikController;
use App\Http\Controllers\Mhs\RegistrasiController;
use App\Http\Controllers\Mhs\BuatIRSController;
use App\Http\Controllers\Mhs\irsSementaraController;
use App\Models\RuangKelas;
use App\Models\Dosen;

//testing component
// Route::get('/header', function () {
//     return view('components.header');
// });
// Route::get('/sidebar', function () {
//     return view('components.sidebar');
// });
// Route::get('/sidebar', function () {
//     return view('components.sidebar');
// });

Route::get('/footerdosen', function () {
    return view('components.footerdosen');
});
Route::get('/footermhs', function () {
    return view('components.footermhs');
});
Route::get('/irs', function () {
    return view('content.mhs.irs');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');



Route::group(['middleware'=>'auth:dosen'], function(){
    Route::get('/dosen/home', [DashboardDosenController::class, 'index'])->name('dosen.dashboard.index');
    Route::get('/dosen/home/statistics', [PerwalianController::class, 'getStatistics'])->name('dosen.dashboard.statistics');
    Route::get('/dosen/perwalian', [PerwalianController::class, 'index'])->name('dosen.perwalian.index');
    Route::get('/dosen/perwalian/{nim}', [PerwalianController::class, 'show'])->name('dosen.perwalian.show');
    Route::post('/dosen/setujuiirs/{id}', [PerwalianController::class, 'setujuiIRS'])->name('dosen.setujuiirs');
    Route::post('/dosen/updateirsstatus', [PerwalianController::class, 'updateIRSStatus'])->name('dosen.updateirsstatus');
    Route::get('/dosen/cetakirs/{semesterId}', [CetakIrsController::class, 'cetakIRS'])->name('dosen.cetakirs');

});

Route::group(['middleware' => 'auth:mhs'], function () {
    Route::get('/mhs/home', [DashboardMhsController::class, 'index'])->name('mhs.dashboard.index');
    Route::get('/mhs/registrasi', [RegistrasiController::class, 'index'])->name('mhs.registrasi.index');
    Route::post('/update-status', [RegistrasiController::class, 'updateStatus'])->name('mhs.registrasi.updateStatus');
    Route::get('/mhs/akademik', [BuatIRSController::class, 'index'])->name('mhs.akademik.index');
    Route::get('/mhs/cetakirs/{semesterId}', [CetakIRSController::class, 'cetakIRS'])->name('mhs.cetakirs');
    // Route::post('/default-mk', [BuatIRSController::class, 'addDefaultMK'])->name('mhs.akademik.index');
    Route::post('/update-mk', [BuatIRSController::class, 'updateMK'])->name('mhs.akademik.updateMK');
    Route::get('/jadwal', [BuatIRSController::class, 'showJadwal'])->name('mhs.akademik.showJadwal');
    Route::post('/update-mk', [BuatIRSController::class, 'updateMK'])->name('update-mk');
    Route::post('/simpan-mk', [BuatIRSController::class, 'simpanMK'])->name('simpan-mk');
    Route::get('/get-jadwal/{kodeMk}', [BuatIRSController::class, 'getJadwal'])->name('get-jadwal');
    Route::post('/isi-irs', [BuatIRSController::class, 'isiIrs'])->name('isi-irs'); 
    // Route::post('/update-irs', [BuatIRSController::class, 'isiIrs'])->name('isi.irs');
    Route::get('/mhs-irs-temp', [BuatIRSController::class, 'irsTemp'])->name('mhs.akademik.irsTemp');
    // Route::post('/irs/delete/{id}', [BuatIrsController::class, 'hapusJadwal'])->name('irs.delete');
    // Route::post('/irs/delete/temp', [BuastIrsController::class, 'hapusJadwal'])->name('irs.delete');
    Route::get('/sks/{nim}', [DashboardMhsController::class, 'hitungSks']);
    Route::get('/get-total-sks', [BuatIRSController::class, 'getTotalSks'])->name('getTotalSks');
    Route::post('/irs/cancel/{jadwalId}', [BuatIrsController::class, 'hapusJadwal'])->name('hapus-jadwal');
    Route::post('/irs/cancel', [BuatIrsController::class, 'hapusJadwal'])->name('hapus-jadwal');



    // Route::get('/mhs/akademik', [BuatIRSController::class, 'index'])->name('mhs.akademik.index');
    // Route::get('/mhs/akademik', [IRSController::class, 'showAkademik'])->name('mhs.akademik.showAkademik');
    // Route::post('mhs/irs/remove-courses', [BuatIRSController::class, 'removeCourseSelection']);
    // Route::post('mhs/irs/update-courses', [BuatIRSController::class, 'saveCourseSelection']);
    // Route::post('mhs/irs/get-selected-courses', [BuatIRSController::class, 'getSelectedCourses']);
    // Route::post('mhs/irs/update-mata-kuliah', [IRSController::class, 'updateMataKuliah']);
});
Route::group(['middleware' => 'auth:kaprodi', 'prefix' => 'kaprodi', 'as' => 'kaprodi.'], function () {
    // Dashboard
    Route::get('/home', [DashboardKaprodiController::class, 'index'])->name('dashboard.index');
    Route::get('/home/jadwal', [DashboardKaprodiController::class, 'jadwal'])->name('dashboard.jadwal');
    Route::get('/kaprodi/matakuliah', [MataKuliahController::class, 'create'])->name('content.kaprodi.matakuliah');
    Route::post('/kaprodi/mata_kuliah', [MataKuliahController::class, 'store'])->name('kaprodi.mata_kuliah.store');
    Route::get('/kaprodi/mata_kuliah', [MataKuliahController::class, 'index'])->name('content.kaprodi.index');
    Route::resource('mata_kuliah', MataKuliahController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('kaprodi/mata-kuliah', MataKuliahController::class)->names([
        'index' => 'content.kaprodi.matakuliah.index',
    ]);
    Route::get('/api/dosen', function () {
        return Dosen::select('nip_dosen', 'nama_dosen')->get();
    });
    Route::delete('/kaprodi/mata_kuliah/{kode_mk}', [MataKuliahController::class, 'destroy'])->name('kaprodi.mata_kuliah.destroy');
    Route::delete('/kaprodi/jadwal/{id_jadwal}', [JadwalController::class, 'destroy'])->name('kaprodi.jadwal.destroy');
    Route::post('kaprodi/jadwal/{id_jadwal}', [JadwalController::class, 'update'])->name('kaprodi.jadwal.update');
    Route::post('/jadwal/ajukan', [JadwalController::class, 'ajukan'])->name('jadwal.ajukan');
    Route::put('/mata-kuliah/{kode_mk}', [MataKuliahController::class, 'update'])->name('kaprodi.mata_kuliah.update');
    Route::put('/jadwal/{id_jadwal}', [JadwalController::class, 'update'])->name('kaprodi.jadwal.update');


    // Route::post('/kaprodi/jadwal/store', [JadwalController::class, 'store'])->name('kaprodi.jadwal.store');

});

Route::prefix('dekan')->middleware(['auth:dekan'])->group(function () {
    Route::get('/home', [DashboardDekanController::class, 'dashboard'])->name('dekan.dashboard.index');
    Route::get('/ruang', [DashboardDekanController::class, 'ruang'])->name('dekan.ruang.index');
    Route::get('/ruang/filter', [DashboardDekanController::class, 'filterRuang'])->name('dekan.ruang.filter');
    Route::get('/ruang/search', [DashboardDekanController::class, 'searchRuang'])->name('dekan.ruang.search');
    Route::post('/ruang/build-update', [DashboardDekanController::class, 'buildUpdate'])->name('dekan.ruang.buildUpdate');
    Route::get('/jadwal', [DashboardDekanController::class, 'index'])->name('dekan.jadwal.index');
    Route::get('/jadwal/filter', [DashboardDekanController::class, 'filterJadwal'])->name('dekan.jadwal.filter');
    Route::get('/jadwal/search', [DashboardDekanController::class, 'searchJadwal'])->name('dekan.jadwal.search');
    Route::post('/jadwal/bulk-update', [DashboardDekanController::class, 'bulkUpdate'])->name('dekan.jadwal.bulkUpdate');
    Route::get('/verifikasijadwal', [DashboardDekanController::class, 'verifikasijadwal'])->name('dekan.verifikasijadwal');
    Route::get('/verifikasiruang', [DashboardDekanController::class, 'verifikasiruang'])->name('dekan.verifikasiruang');
    Route::patch('/verifikasi/{id_jadwal}', [DashboardDekanController::class, 'updateStatus'])->name('dekan.verifikasi.update');
    Route::patch('/verifikasiruang/{id}', [DashboardDekanController::class, 'updateRuang'])->name('dekan.verifikasiruang.update');
});

Route::get('/dekan', function () {
    return view('content.dekan.dashboard');

});

Route::get('/test-ruang', function () {
    $ruang = RuangKelas::all();
    return response()->json($ruang);
});

// Route::get('/mhs/IRSmhs', function () {
//     return view('IRSmhs');

// });

Route::group(['middleware'=>'auth:akademik'], function(){
    Route::get('/akademik/home', [DashboardAkademikController::class, 'index'])->name('akademik.dashboard.index');
    Route::resource('/akademik/ruang', RuangKelasController::class, [
        'names' => [
            'index' => 'akademik.ruang.index',
            'create' => 'akademik.ruang.create',
            'store' => 'akademik.ruang.store',
            'edit' => 'akademik.ruang.edit',
            'update' => 'akademik.ruang.update',
            'destroy' => 'akademik.ruang.destroy',
        ],
    ])->except(['show']);
    Route::patch('/akademik/ruang/ajukan-all', [RuangKelasController::class, 'ajukanAll'])->name('akademik.ruang.ajukan-all');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

