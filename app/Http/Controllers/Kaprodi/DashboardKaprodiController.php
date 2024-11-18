<?php

namespace App\Http\Controllers\Kaprodi;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardKaprodiController extends Controller
{
    public function index(): View{
        return view('content.kaprodi.dashboard');
    }

    public function matkul(): View{
        return view('content.kaprodi.matakuliah');
    }

    public function jadwal(): View{
        return view('content.kaprodi.jadwal');
    }
}
