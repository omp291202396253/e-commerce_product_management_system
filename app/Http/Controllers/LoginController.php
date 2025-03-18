<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_form()
    {
        return view('auth.login');
    }

    public function register_form()
    {
        return view('auth.register');
    }
}
