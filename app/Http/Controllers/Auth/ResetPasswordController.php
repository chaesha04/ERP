<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        $email = $request->query('email');
        return view('auth.passwords.reset', compact('token', 'email'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $record = DB::table('password_resets')->where('email', $request->email)->first();

        if (
            !$record
            || !Hash::check($request->token, $record->token)
            || now()->subMinutes(60)->gt($record->created_at)
        ) {
            return back()->withErrors(['email' => 'Token reset password tidak valid atau sudah kadaluarsa.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password berhasil diubah. Silakan login.');
    }
}
