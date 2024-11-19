<?php

namespace App\Http\Controllers\Mhs;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa; 


class DashboardMhsController extends Controller
{
    public function index(): View{
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data dosen terkait user
        $mhs = Mahasiswa::where('email', $user->email)->first();

        return view('content.mhs.dashboard', compact('user', 'mhs'));
    }

    public function akademik(): View{
        return view('content.mhs.akademik');
    }    
    public function registrasi(): View{
        return view('content.mhs.registrasi');
    }    

    
}
