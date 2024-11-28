<?php

namespace App\Http\Controllers\Dekan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardDekanController extends Controller
{
    public function index(): View
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data dosen terkait user
        $dekan = $user->dekan;

        return view('content.dekan.dashboard', compact('user', 'dekan'));
    }

    public function ruang(): View{
        return view('content.dekan.ruang');
    }

    public function jadwal(): View{
        return view('content.dekan.jadwal');
    }

    public function verifikasijadwal(){
        return view('content.dekan.verifikasijadwal');
    }

}