<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        $postData = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $credentials = [
            'username' => $postData['username'],
            'password' => $postData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->peran == 'resepsionis' || $user->peran == 'asisten' || $user->peran == 'apoteker') {
                return redirect('dashboard/pasien')->with('_token', Session::token());
            } 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->peran == ['asisten dokter', 'apoteker', 'resepsionis']) {
                return response([
                    'success' => true,
                    'redirect_url' => 'dashboard/auth',
                    'pesan' => 'login berhasil'
                ], 200);
            } else {
                return response([
                    'success' => true,
                    'redirect_url' => '',
                    'pesan' => 'Anda Bukan Admin'
                ], 200);
            }
        } else {
            return response([
                'success' => false
            ], 401);
        }
    }}
    
    //logout
    public function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/logout');
    }
    }