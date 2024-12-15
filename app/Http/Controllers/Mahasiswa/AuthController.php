<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        $prodis = \App\Models\Prodi::all();
        return view('mahasiswa.auth.register', compact('prodis'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nim' => 'required|string|size:10|unique:users,nim',
            'id_prodi' => 'required|exists:prodis,id',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nim' => $request->nim,
            'id_prodi' => $request->id_prodi,
            'semester' => $request->semester,
        ]);

        auth()->login($user);

        return redirect()->route('mahasiswa.dashboard');
    }

    public function showLoginForm()
    {
        return view('mahasiswa.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('mahasiswa.dashboard');
        }

        return back()->withErrors(['password' => 'Password salah.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('mahasiswa.login');
    }
}
