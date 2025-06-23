<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $users = [
        [
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@finpocket.com',
            'password' => 'password123'
        ],
    ];

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = collect($this->users)->firstWhere('email', $credentials['email']);

        // Verifikasi password
        if ($user && $credentials['password'] === $user['password']) {
            // Login manual tanpa model
            Auth::loginUsingId($user['id']);
            
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}