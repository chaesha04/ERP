<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAccessMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::guard('employee')->user(); // Gunakan guard yang sesuai

        if (!$user) {
            return redirect()->route('login');
        }

        // Super Admin selalu boleh akses
        if ($user->role === 'Super Admin') {
            return $next($request);
        }

        // Cek role
        if (!in_array($user->role, $roles)) {
            return redirect()->route('access.denied');
        }

        return $next($request);
    }
}
