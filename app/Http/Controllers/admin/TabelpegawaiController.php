<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Support\Facades\Hash;

class TabelpegawaiController extends Controller
{
    // Menampilkan daftar semua pegawai
    public function index()
    {
        // Mengambil data pegawai dengan relasi role dan akses poli
        // whereIn([2,3,4]) untuk mengambil hanya pegawai dengan role_id 2 (staff), 3 (dokter), dan 4
        $pegawai = User::with('role', 'poli')->whereIn('role_id', [2, 3, 4])->get();
        return view('admin.tabelpegawai', compact('pegawai'));
    }

    // Menampilkan form tambah pegawai
    public function create()
    {
        // Mengambil data role untuk staff (2) dan dokter (3)
        $roles = Role::whereIn('id', [2, 3])->get();
        // Mengambil semua data poli untuk pilihan akses
        $akses = Poli::all();
        return view('admin.tambahpegawai', compact('roles', 'akses'));
    }

    // Menyimpan data pegawai baru
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
            'akses_poli_id' => 'required_if:role_id,3', // Wajib diisi jika role adalah dokter
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->all();

        // Upload dan simpan foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
            $data['foto'] = basename($fotoPath);
        }

        // Hash password sebelum disimpan
        $data['password'] = Hash::make($data['password']);

        // Jika rolenya staff (2), akses_poli_id diset null karena bisa akses semua
        // if ($data['role_id'] == 2) {
        //     $data['akses_poli_id'] = null;
        // }

        // Simpan data user baru
        User::create($data);

        return redirect()->route('admin.tabelpegawai')
            ->with('success', 'Pegawai berhasil ditambahkan!');
    }

    // Menampilkan form edit pegawai
    public function edit($id)
    {
        // Mengambil data user beserta relasi role dan akses
        $user = User::with(['role'])->findOrFail($id);
        $roles = Role::whereIn('id', [2, 3])->get();
        $polis = Poli::all();

        return view('admin.editpegawai', compact('user', 'roles', 'polis'));
    }

    // Mengupdate data pegawai
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'akses_poli_id' => 'required_if:role_id,3', // Wajib diisi jika role dokter
            'password' => 'nullable|min:6', // Optional, hanya jika ingin update password
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->except(['password', 'foto']);

        // Update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
            $data['foto'] = basename($fotoPath);
        }

        // Update akses poli berdasarkan role
        if ($data['role_id'] == 2) { // Jika staff
            $data['akses_poli_id'] = null; // Bisa akses semua poli
        }

        $user->update($data);

        return redirect()->route('table.user')
            ->with('success', 'Data pegawai berhasil diperbarui!');
    }

    // Menghapus data pegawai
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('table.user')->with('success', 'Data pegawai berhasil dihapus!');
    }



    // Method untuk mengecek akses poli
    public function checkPoliAccess($user, $poliId)
    {
        if ($user->role_id == 2) { // Jika staff
            return true; // Bisa akses semua poli
        }

        if ($user->role_id == 3) { // Jika dokter
            return $user->akses_poli_id == $poliId; // Hanya bisa akses poli yang ditugaskan
        }

        return false;
    }
}
