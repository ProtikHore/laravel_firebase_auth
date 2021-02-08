<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loadLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $loginData = $request->except('_token', 'confirmed');
        $loginData['password'] = sha1($loginData['password']);
        $user = User::where($loginData)->first();
        if ($user) {
            session([
                'login_status' => true,
                'id' => $user->id,
                'login_id' => $user->login_id,
                'name' => $user->name
            ]);
            return response()->json('Authorized User');
        } else {
            return response()->json('Unauthorized Access!');
        }
    }


    public function loadOtpLogin()
    {
        return view('otp_login');
    }

    public function optLogin(Request $request)
    {
        $loginData = $request->except('_token');
        $user = User::where($loginData)->first();
        if ($user) {
            session([
                'login_status' => true,
                'id' => $user->id,
                'login_id' => $user->login_id,
                'name' => $user->name
            ]);
            return response()->json('Authorized User');
        } else {
            return response()->json('Unauthorized Access!');
        }
    }

    public function checkNumber(Request $request)
    {
        //return response()->json($request->get('phone_no'));
        $number = User::where('mobile_number', $request->get('phone_no'))->first();
        if ($number) {
            return response()->json('Number Found');
        } else {
            return response()->json('Number not found');
        }
    }

    public function dashboard()
    {
        $title = 'OTP LOGIN';
        return view('dashboard', compact('title'));
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }


}
