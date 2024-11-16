<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Mhs\DashboardMhsController;
use App\Http\Controllers\Dosen\DashboardDosenController;
use App\Http\Controllers\Akademik\DashboardAkademikController;

//testing component
Route::get('/header', function () {
    return view('components.header');
});
Route::get('/sidebar', function () {
    return view('components.sidebar');
});
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
});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/mhs/IRSmhs', function () {
    return view('IRSmhs');

});

Route::group(['middleware'=>'auth:akademik'], function(){
    Route::get('/akademik/home', [DashboardAkademikController::class, 'index'])->name('akademik.dashboard.index');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

