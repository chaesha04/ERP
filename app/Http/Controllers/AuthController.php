<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\Employee;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $employee = Employee::where('email', $request->email)->first();

        if (!$employee || !Hash::check($request->password, $employee->password)) {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        Auth::guard('employee')->login($employee);

        return match(strtolower($employee->role)) {
            'super admin'     => redirect('/controlaccess'),
            'sales admin'     => redirect('/salesmodule'),
            'inventory admin' => redirect('/product/accommodation'),
            'front office'    => redirect('/bookingandreservation/accommodation'),
            default           => redirect()->route('login')->withErrors(['email' => 'Role tidak valid']),
        };
    }

    // Logout
    public function logout(Request $request)
{
    Auth::guard('employee')->logout(); // pastikan logout dari guard employee
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
}

    // Form lupa password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Kirim link reset password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('employees')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Tampilkan form reset password
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::broker('employees')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Employee $employee, string $password) {
                $employee->password = Hash::make($password);
                $employee->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
