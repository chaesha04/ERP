<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            switch ($user->role) {
                case 'Superadmin':
                    return redirect('/superadmin/dashboard');
                case 'Sales':
                    return redirect('/sales/dashboard');
                case 'Inventory':
                    return redirect('/inventory/dashboard');
                default:
                    Auth::logout();
                    return back()->withErrors(['email' => 'Role user tidak dikenal.']);
            }
        }
        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
}
