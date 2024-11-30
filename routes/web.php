<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dosen\PerwalianController;
use App\Http\Controllers\Mhs\DashboardMhsController;
use App\Http\Controllers\Akademik\RuangKelasController;
use App\Http\Controllers\Dekan\DashboardDekanController;
use App\Http\Controllers\Dosen\DashboardDosenController;
use App\Http\Controllers\Kaprodi\DashboardKaprodiController;
use App\Http\Controllers\Kaprodi\MataKuliahController;
use App\Http\Controllers\Akademik\DashboardAkademikController;
use App\Http\Controllers\Mhs\RegistrasiController;
use App\Http\Controllers\Mhs\BuatIRSController;
use App\Models\RuangKelas;

//testing component
// Route::get('/header', function () {
//     return view('components.header');
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
    Route::get('/dosen/perwalian', [PerwalianController::class, 'index'])->name('dosen.perwalian.index');
    Route::get('/dosen/perwalian/{nim}', [PerwalianController::class, 'show'])->name('dosen.perwalian.show');

});

Route::group(['middleware' => 'auth:mhs'], function () {
    Route::get('/mhs/home', [DashboardMhsController::class, 'index'])->name('mhs.dashboard.index');
    Route::get('/mhs/registrasi', [RegistrasiController::class, 'index'])->name('mhs.registrasi.index');
    Route::post('/update-status', [RegistrasiController::class, 'updateStatus']);
    Route::get('/mhs/akademik', [BuatIRSController::class, 'index'])->name('mhs.akademik.index');
    Route::post('/update-mata-kuliah', [BuatIRSController::class, 'updateMataKuliah'])->name('update-mata-kuliah');
    // Route::post('mhs/irs/remove-courses', [BuatIRSController::class, 'removeCourseSelection']);
    // Route::post('mhs/irs/update-courses', [BuatIRSController::class, 'saveCourseSelection']);
    // Route::post('mhs/irs/get-selected-courses', [BuatIRSController::class, 'getSelectedCourses']);
    // Route::post('mhs/irs/update-mata-kuliah', [IRSController::class, 'updateMataKuliah']);
});

Route::group(['middleware'=>'auth:kaprodi'], function(){
    Route::get('/kaprodi/home', [DashboardKaprodiController::class, 'index'])->name('kaprodi.dashboard.index');
    Route::get('/kaprodi/jadwal', [DashboardKaprodiController::class, 'jadwal'])->name('kaprodi.jadwal.index');
    
    // Menggunakan resource route untuk mata kuliah
    Route::resource('mata_kuliah', MataKuliahController::class);
});


Route::prefix('dekan')->middleware(['auth:dekan'])->group(function () {
    Route::get('/home', [DashboardDekanController::class, 'dashboard'])->name('dekan.dashboard.index');
    Route::get('/ruang', [DashboardDekanController::class, 'ruang'])->name('dekan.ruang.index');
    Route::get('/jadwal', [DashboardDekanController::class, 'index'])->name('dekan.jadwal.index');
    Route::patch('/dekan/verifikasi/{id}', [DashboardDekanController::class, 'updateStatus'])->name('dekan.verifikasi.update');
    Route::get('/jadwal/verifikasijadwal', [DashboardDekanController::class, 'verifikasijadwal'])->name('dekan.verifikasijadwal');
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
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

