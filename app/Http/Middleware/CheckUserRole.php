<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) { // Gunakan Auth::check() secara eksplisit
            return redirect('login');
        }

        $user = Auth::user();

        if (in_array($user->role_id, $roles)) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Unauthorized access');
    }
}
