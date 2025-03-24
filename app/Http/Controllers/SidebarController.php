<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli;

class SidebarController extends Controller
{
    public function getSidebar()
    {
        $polis = Poli::all(); // Ambil semua data dari tabel poli
        return view('partials.headerDokter', compact('polis'));
    }
}

