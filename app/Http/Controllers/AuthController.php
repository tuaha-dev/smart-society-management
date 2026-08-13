<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Handle the login submission
    public function login(Request $request)
    {
        // Validate user inputs
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Attempt login with username & password
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Get the logged-in user's role
            $role = Auth::user()->role;

            // Redirect based on role
            if ($role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'Resident') {
                return redirect()->route('resident.dashboard');
            } elseif ($role === 'Guard') {
                return redirect()->route('guard.dashboard');
            }
        }

        // If login fails, return back with an error
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->onlyInput('username');
    }

    // 3. Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}