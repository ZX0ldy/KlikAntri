<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('login.register');
    }

  public function signupproses(Request $request)
{
    $data = $request->validate([
        "name" => "required|string|max:255",
        "phone" => "required|string|max:15",
        "email" => "required|email|unique:users,email",
        "password" => "required|min:6|confirmed",
        "role_id" => "required|exists:roles,id",
    ]);

    $data['password'] = Hash::make($data['password']);

    // Debug: Cek apakah data sudah sesuai
    // dd($data);

    // Buat pengguna baru
    $user = User::create($data);

    return redirect('/')->with('status', 'Registrasi berhasil, silakan login.');
}

}
