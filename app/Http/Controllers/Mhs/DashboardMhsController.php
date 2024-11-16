<?php

namespace App\Http\Controllers\Mhs;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardMhsController extends Controller
{
    public function index(): View{
        return view('content.mhs.dashboard');
    }

    public function akademik(): View{
        return view('content.mhs.akademik');
    }    
}
