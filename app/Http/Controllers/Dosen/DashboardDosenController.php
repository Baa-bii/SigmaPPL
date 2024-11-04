<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class DashboardDosenController extends Controller
{
    public function index(): View{
        return view('content.dosen.dashboard');
    }

    public function akademik(): View{
        return view('content.dosen.akademik');
    }

    public function irs(): View{
        return view('content.dosen.isi.irs');
    }
}
