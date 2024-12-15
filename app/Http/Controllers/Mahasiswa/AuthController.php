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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nim' => 'required|string|size:10|unique:users,nim',
            'id_prodi' => 'required|exists:prodis,id',
            'semester' => 'required|integer|min:1|max:14',
        ];

        $messages = [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',
            'name.max' => 'Nama lengkap tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',

            'nim.required' => 'NIM wajib diisi.',
            'nim.string' => 'NIM harus berupa teks.',
            'nim.size' => 'NIM harus terdiri dari 10 karakter.',
            'nim.unique' => 'NIM sudah terdaftar.',

            'id_prodi.required' => 'Program studi wajib dipilih.',
            'id_prodi.exists' => 'Program studi yang dipilih tidak valid.',

            'semester.required' => 'Semester wajib diisi.',
            'semester.integer' => 'Semester harus berupa angka.',
            'semester.min' => 'Semester tidak boleh kurang dari 1.',
            'semester.max' => 'Semester tidak boleh lebih dari 8.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

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
