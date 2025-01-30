<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index(){
		return view('pegawai.pegawai');
	}
}