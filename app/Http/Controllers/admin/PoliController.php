<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nama_poli' => 'required',
        'background_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'icon_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
    ]);

    // Generate unique names for the files
    $backgroundFileName = uniqid() . '.' . $request->file('background_image')->getClientOriginalExtension();
    $iconFileName = uniqid() . '.' . $request->file('icon_image')->getClientOriginalExtension();

    // Save files to specific directories
    $backgroundPath = $request->file('background_image')->storeAs('public/backgrounds', $backgroundFileName);
    $iconPath = $request->file('icon_image')->storeAs('public/icons', $iconFileName);

    Poli::create([
        'nama_poli' => $request->nama_poli,
        'background_image' => 'storage/' . $backgroundPath, // Directly use the path
        'icon_image' => 'storage/' . $iconPath
    ]);

    return redirect()->back()->with('success', 'Poli berhasil ditambahkan');
}


    public function create()
    {
        $polis = Poli::withCount('users')->whereIn('status', [1, 2])->get();
        return view('admin.loket', compact('polis'));
    }

    public function toggleStatus(Request $request, $id)
    {
        try {
            $poli = Poli::findOrFail($id);

            // Ubah status menjadi 2 jika saat ini 1, atau menjadi 1 jika saat ini 2
            $poli->status = $poli->status == 1 ? 2 : 1;
            $poli->save();

            return response()->json([
                'success' => true,
                'message' => 'Status poli berhasil diperbarui',
                'new_status' => $poli->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status poli: ' . $e->getMessage()
            ], 500);
        }
    }
}