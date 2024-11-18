<?php

namespace App\Http\Controllers\Dekan;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardDekanController extends Controller
{
    public function index(): View{
        return view('content.dekan.dashboard');
    }

    public function ruang(): View{
        return view('content.dekan.ruang');
    }

    public function jadwal(): View{
        return view('content.dekan.jadwal');
    }
}
