<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as RedirectIfAuthenticatedMiddleware;

class RedirectIfAuthenticated extends RedirectIfAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response | JsonResponse
    {
        if(Auth::guard('dosen')->check()){
            return redirect(route('dosen.dashboard.index'));
        }
        else if(Auth::guard('mhs')->check()){
            return redirect(route('mhs.dashboard.index'));
        }
        else if(Auth::guard('akademik')->check()){
            return redirect(route('akademik.dashboard.index'));
        }
        else if(Auth::guard('dekan')->check()){
            return redirect()->route('dekan.dashboard.index');
        }
        else if(Auth::guard('kaprodi')->check()){
            return redirect(route('kaprodi.dashboard.index'));
        }
        return $next($request);
    }
}
