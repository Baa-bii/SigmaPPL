<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAkademikController extends Controller
{
    public function index(): View{
        return view('content.akademik.dashboard');
    }

    public function ruang(): View{
        return view('content.akademik.ruangan');
    }
}
