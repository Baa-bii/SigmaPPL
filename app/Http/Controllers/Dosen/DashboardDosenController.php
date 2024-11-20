<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardDosenController extends Controller
{
    public function index(): View
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data dosen terkait user
        $dosen = $user->dosen;

        return view('content.dosen.dashboard', compact('user', 'dosen'));
    }

    public function akademik(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        return view('content.dosen.akademik', compact('user', 'dosen'));
    }

    public function irs(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        return view('content.dosen.isi.irs', compact('user', 'dosen'));
    }

    public function perwalian(): View
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        return view('content.dosen.perwalian', compact('user', 'dosen'));
    }
}
