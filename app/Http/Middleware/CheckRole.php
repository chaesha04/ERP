<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Super Admin selalu bisa akses
        if ($user->role === 'Super Admin') {
            return $next($request);
        }

        // Cek role lain
        if (!in_array($user->role, $roles)) {
            return redirect()->route('unauthorized'); // Redirect jika role tidak sesuai
        }

        return $next($request);
    }
}
