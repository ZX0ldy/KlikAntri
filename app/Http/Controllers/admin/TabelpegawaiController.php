<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PoliAkses;
use App\Models\Poli;

class TabelpegawaiController extends Controller
{
    public function index()
    {
        $pegawai = User::with('role', 'akses')->get();
        return view('admin.tabelpegawai', compact('pegawai'));
    }

    public function tambahPegawai()
    {
        $roles = Role::all();
        $akses = Poli::all();
        return view('admin.tambahpegawai', compact('roles', 'akses'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'nullable|exists:roles,id',
            'akses_poli_id' => 'nullable|exists:polis,id',
        ]);

        // dd($request);

        // Buat user baru
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']); // Enkripsi password
        $user->role_id = $validated['role_id'] ?? null; // Null jika tidak diisi
        $user->akses_poli_id = $validated['akses_poli_id'] ?? null; // Null jika tidak diisi

        // Simpan data ke database
        $user->save();

        // Redirect atau respon sukses
          
    return redirect()->route('table.user')->with('create_success', 'User berhasil dibuat.');
    }

    public function destroy($id)
    {
        // Cari user berdasarkan id
        $user = User::find($id);

        // Jika user tidak ditemukan, tampilkan error
        if (!$user) {
            return redirect()->route('table.user')->with('create_success', 'User berhasil ditambahkan.');
        }

        // Hapus user
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('table.user')->with('delete_success', 'User berhasil dihapus.');
    }

    public function edit($id)
    {
        $user = User::find($id);  // Ambil data user berdasarkan ID
        $roles = Role::all();  // Ambil semua role
        $akses = PoliAkses::all();  // Ambil semua akses poli
        return view('admin.editpegawai', compact('user', 'roles', 'akses'));  // Kirim data ke view
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'akses_poli_id' => 'required|exists:akses_polis,id',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',  // Biarkan kosong jika tidak mengubah password
        ]);

        $user = User::find($id);
        $user->update($validatedData);  // Update data user

        // Jika password diubah, hash password baru
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('table.user')->with('success', 'User berhasil diperbarui.');
    }



}
