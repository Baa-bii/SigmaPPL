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
}
