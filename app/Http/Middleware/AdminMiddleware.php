<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Debugging: Cek user yang sedang login
        // HAPUS dd(Auth::user()) setelah debugging selesai
        // dd(Auth::user());

        // Cek apakah user memiliki role admin (role_id = 4)
        if (Auth::user()->role_id != 4) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses.');
        }

        // Jika semua kondisi terpenuhi, lanjut ke request berikutnya
        return $next($request);
    }
}

