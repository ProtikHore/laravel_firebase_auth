<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loadLogin()
    {
        return view('login');
    }

    public function otpLogin()
    {
        return view('otp_login');
    }
}
