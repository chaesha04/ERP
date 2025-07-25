<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    function authenticating(Request $request){
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);
    
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'Login invalid! Please input valid email and password',
        ])->onlyInput('email');
    } 

    function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
