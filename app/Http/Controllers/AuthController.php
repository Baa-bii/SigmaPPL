<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserAuthVerifyRequest;

class AuthController extends Controller
{
    public function index():View
    {
        return view('auth.login');
    }

    public function verify(UserAuthVerifyRequest $request) : RedirectResponse{
        $data = $request->validated();

        if (Auth::guard('dosen')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>'dosen'])){
            $request->session()->regenerate();
            return redirect()->intended('/dosen/home');
        }
        else if (Auth::guard('mhs')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>'mhs'])){
            $request->session()->regenerate();
            return redirect()->intended('/mhs/home');
        }
        else if (Auth::guard('akademik')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>'akademik'])){
            $request->session()->regenerate();
            return redirect()->intended('/akademik/home');
        }
        else if (Auth::guard('dekan')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>'dekan'])){
            $request->session()->regenerate();
            return redirect()->intended('/dekan/home');
        }
        else if (Auth::guard('kaprodi')->attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>'kaprodi'])){
            $request->session()->regenerate();
            return redirect()->intended('/kaprodi/home');
        }
        else{
            return redirect(route('login'))->with('msg', 'Email dan password salah');
        }
    }

    public function logout():RedirectResponse{
        if (Auth::guard('dosen')->check()){
            Auth::guard('dosen')->logout();
        }
        else if (Auth::guard('mhs')->check()){
            Auth::guard('mhs')->logout();
        }
        else if (Auth::guard('akademik')->check()){
            Auth::guard('akademik')->logout();
        }
        else if (Auth::guard('dekan')->check()){
            Auth::guard('dekan')->logout();
        }
        else if (Auth::guard('kaprodi')->check()){
            Auth::guard('kaprodi')->logout();
        }
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('msg', 'You have been logged out.');
    }
}
