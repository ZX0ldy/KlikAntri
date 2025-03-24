<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah role user sesuai
        if (Auth::user()->role != $role) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
