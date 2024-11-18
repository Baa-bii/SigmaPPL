<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Mhs\DashboardMhsController;
use App\Http\Controllers\Dekan\DashboardDekanController;
use App\Http\Controllers\Dosen\DashboardDosenController;
use App\Http\Controllers\Kaprodi\DashboardKaprodiController;
use App\Http\Controllers\Akademik\DashboardAkademikController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');



Route::group(['middleware'=>'auth:dosen'], function(){
    Route::get('/dosen/home', [DashboardDosenController::class, 'index'])->name('dosen.dashboard.index');
    Route::get('/dosen/akademik', [DashboardDosenController::class, 'akademik'])->name('dosen.akademik.index');
    Route::get('/dosen/isi/irs', [DashboardDosenController::class, 'irs'])->name('dosen.isi.irs.index');
    Route::get('/dosen/isi/perwalian', [DashboardDosenController::class, 'perwalian'])->name('dosen.perwalian.index');
});

Route::group(['middleware'=>'auth:mhs'], function(){
    Route::get('/mhs/home', [DashboardMhsController::class, 'index'])->name('mhs.dashboard.index');
    Route::get('/mhs/home', [DashboardMhsController::class, 'index'])->name('mhs.akademik.index');
});

Route::group(['middleware'=>'auth:kaprodi'], function(){
    Route::get('/kaprodi/home', [DashboardKaprodiController::class, 'index'])->name('kaprodi.dashboard.index');
    Route::get('/kaprodi/matakuliah', [DashboardKaprodiController::class, 'index'])->name('kaprodi.matakuliah.index');
    Route::get('/kaprodi/jadwal', [DashboardKaprodiController::class, 'index'])->name('kaprodi.jadwal.index');
});

Route::group(['middleware'=>'auth:dekan'], function(){
    Route::get('/dekan/home', [DashboardDekanController::class, 'index'])->name('dekan.dashboard.index');
    Route::get('/dekan/ruang', [DashboardDekanController::class, 'ruang'])->name('dekan.ruang.index');
    Route::get('/dekan/jadwal', [DashboardDekanController::class, 'jadwal'])->name('dekan.jadwal.index');
});


Route::get('/mhs/IRSmhs', function () {
    return view('IRSmhs');

});

Route::group(['middleware'=>'auth:akademik'], function(){
    Route::get('/akademik/home', [DashboardAkademikController::class, 'index'])->name('akademik.dashboard.index');
    Route::get('/akademik/ruang', [DashboardAkademikController::class, 'ruang'])->name('akademik.ruang.index');
});

Route::get('/db', function () {
    return view('content.mhs.dashboard');
});

Route::get('/akademik', function () {
    return view('content.mhs.akademik');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

