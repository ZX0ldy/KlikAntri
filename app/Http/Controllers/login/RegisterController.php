<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
		return view('login.register');
	}
}