<?php
    namespace App\Http\Controllers\admin;

    use App\Http\Controllers\Controller;
    use App\Models\Poli;
    use Illuminate\Http\Request;

    class PoliController extends Controller
    {
        public function index()
        {
            return view("landingpage");
        }
        public function store(Request $request)
        {
            // dd($request->all());
            try {
                $request->validate([
                    'nama_poli' => 'required',
                    'icon_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
                ]);

                // Generate prefix dari nama poli
                $words = explode(' ', $request->nama_poli);
                if (count($words) > 1) {
                    // Jika nama poli lebih dari 1 kata, ambil huruf pertama dari setiap kata
                    $prefix = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                } else {
                    // Jika nama poli hanya 1 kata, ambil 2 huruf pertama
                    $prefix = strtoupper(substr($request->nama_poli, 0, 2));
                }

                $iconFileName = uniqid() . '.' . $request->file('icon_image')->getClientOriginalExtension();
                $iconPath = $request->file('icon_image')->storeAs('icons', $iconFileName, 'public');

                Poli::create([
                    'limit_reservasi' => $request->limit_reservasi,
                    'jam_buka' => $request->jam_buka,
                    'jam_tutup' => $request->jam_tutup,
                    'nama_poli' => $request->nama_poli,
                    'icon_image' => 'storage/' . $iconPath,
                    'prefix' => $prefix,
                    'status' => 1
                ]);

                return redirect()->route('loket.create')->with('success', 'Poli berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                    ->withInput();
            }
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

                // Ubah status sesuai dengan request
                $poli->status = $request->status;
                $poli->save();

                return response()->json(['success' => true, 'message' => 'Status poli berhasil diperbarui']);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memperbarui status poli: ' . $e->getMessage()
                ], 500);
            }
        }
        public function destroy($id)
        {
            try {
                $poli = Poli::findOrFail($id);

                // Instead of deleting, mark as inactive or deleted
                $poli->status = 0; // Assuming 0 means inactive/deleted
                $poli->save();

                return redirect()->back()->with('success', 'Poli berhasil dinonaktifkan');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal menonaktifkan poli: ' . $e->getMessage());
            }
        }
    }
