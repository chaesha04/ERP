<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleAccessMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::guard('employee')->user();

        if (!$user) {
            return redirect()->route('access.denied');
        }

        // Super Admin selalu boleh
        if ($user->role === 'Super Admin') {
            return $next($request);
        }

        // Cek apakah role user ada di dalam list yang diizinkan
        if (!in_array($user->role, $roles)) {
            return redirect()->route('access.denied');
        }

        return $next($request);
    }
}
