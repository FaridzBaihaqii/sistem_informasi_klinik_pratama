<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.formlogin');
    }

    public function check(Request $request)
    {
        $postData = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($postData)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return response([
                    'success' => true,
                    'redirect_url' => 'dashboard/',
                    'pesan' => 'login berhasil'
                ], 200);
            } else {
                return response([
                    'success' => true,
                    'redirect_url' => 'user/profile',
                    'pesan' => 'Anda Bukan Admin'
                ], 200);
            }
        } else {
            return response([
                'success' => false
            ], 401);
        }
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/auth');
    }
}
