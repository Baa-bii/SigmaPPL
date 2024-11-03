<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dosen\DashboardDosenController;
use App\Http\Controllers\Mhs\DashboardMhsController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');



Route::group(['middleware'=>'auth:dosen'], function(){
    Route::get('/dosen/home', [DashboardDosenController::class, 'index'])->name('dosen.dashboard.index');
    Route::get('/dosen/akademik', [DashboardDosenController::class, 'akademik'])->name('dosen.akademik.index');
});

Route::group(['middleware'=>'auth:mhs'], function(){
    Route::get('/mhs/home', [DashboardMhsController::class, 'index'])->name('mhs.dashboard.index');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');