<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba melakukan otentikasi
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil
            $user = Auth::user();

            // Redirect berdasarkan peran pengguna
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/user/dashboard');
            }
        }

        // Jika otentikasi gagal
        return redirect('/login')->withErrors(['email' => 'Invalid email or password']);
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Logika lain, jika diperlukan
        return redirect('/login')->with('status', 'Registrasi berhasil! Silakan login.');
    }
}

