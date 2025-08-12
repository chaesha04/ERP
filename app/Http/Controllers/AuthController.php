<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login() {
        return view('login');
    }
    function resetpassword() {
        return view('resetpassword');
    }

    function authenticating(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('employee')->attempt($credentials)) {
            $request->session()->regenerate();

            // Optional: redirect berdasarkan role
            $user = Auth::guard('employee')->user();
            if ($user->role === 'Sales Admin') {
                return redirect()->intended('/salesmodule');
            } elseif ($user->role === 'Inventory Admin') {
                return redirect()->intended('/product/accommodation');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Login invalid! Please input valid email and password',
        ])->onlyInput('email');
    }

    function logout(Request $request) {
        Auth::guard('employee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}