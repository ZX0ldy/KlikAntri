<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.sign-in');
    }

    public function loginproses(Request $request)
    {
        // Validasi input data
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Cek apakah pengguna ada
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            // Pengguna tidak ada
            return response()->json([
                'success' => false,
                'message' => 'Maaf, email Anda tidak terdaftar'
            ], 400);
        }

        // Cek apakah email dan password benar
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();



            $role = Auth::user()->role_id;

            // Redirect berdasarkan role
            if ($role == 1) {
                return redirect()->route('landingpage'); // Halaman untuk role 1
            }

            if ($role == 3) {
                return redirect()->route('dokter'); // Halaman untuk role 3
            }
            if ($role == 4) {
                return redirect()->route('loket.create'); // Halaman untuk role 4
            }

            // Jika role tidak sesuai, arahkan ke halaman default
            return redirect('/');
        }

        // Jika gagal login
        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah'
        ], 400);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
