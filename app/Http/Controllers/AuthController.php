<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    function index()
    {
        return view('dashboard');
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // dd('mantap');

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            return redirect('/manajemen_aset/prasarana')->with('success', 'Login berhasil');
        }
        return back()->with('error', 'Email or Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
