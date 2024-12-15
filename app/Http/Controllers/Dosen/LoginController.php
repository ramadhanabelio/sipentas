<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('dosen.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $lecturer = \App\Models\Lecturer::where('email', $request->email)->first();

        if (!$lecturer) {
            return back()->withErrors(['email' => 'Email salah.'])->withInput();
        }

        if (Auth::guard('lecturer')->attempt($credentials)) {
            return redirect()->route('dosen.dashboard');
        }

        return back()->withErrors(['password' => 'Password salah.'])->withInput();
    }

    public function dashboard()
    {
        return view('dosen.dashboard');
    }

    public function logout()
    {
        Auth::guard('lecturer')->logout();
        return redirect()->route('dosen.login');
    }
}
