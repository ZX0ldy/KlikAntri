<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;

class SignController extends Controller
{
    public function index()
    {
        return view('login.sign-in');
    }
}