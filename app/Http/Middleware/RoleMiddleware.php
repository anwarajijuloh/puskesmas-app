<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($role === 'dokter' && $user->role !== 'dokter') {
                return redirect()->route('pasien.dashboard')->with('error', 'Access denied.');
            }

            if ($role === 'pasien' && $user->role !== 'pasien') {
                return redirect()->route('dokter.dashboard')->with('error', 'Access denied.');
            }
        }

        return $next($request);
    }
}
