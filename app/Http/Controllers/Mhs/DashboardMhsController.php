<?php

namespace App\Http\Controllers\Mhs;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardMhsController extends Controller
{
    public function index(): View{
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data dosen terkait user
        $mhs = $user->mhs;

        return view('content.mhs.dashboard', compact('user', 'mhs'));
    }

    public function akademik(): View{
        return view('content.mhs.akademik');
    }    
}
