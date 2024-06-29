<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotDokter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = 'dokter'): Response
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('pasien.dashboard')->with('error', 'Access denied. You do not have doctor access.');
        }
        return $next($request);
    }
}
