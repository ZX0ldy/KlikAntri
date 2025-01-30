<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class InterfaceOf extends Controller
{
    public function index()
    {
        $polis = Poli::where('status', 2)->get();
        return view('landingof', compact('polis'));
    }
}
  
