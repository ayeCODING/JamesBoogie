<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Cek apakah user sudah login dan memiliki peran admin
        if (Auth::check() && Auth::user()->is_admin === 1) {
            return $next($request);
        }

        // Jika bukan admin atau belum login, tampilkan error 403 (Forbidden)
        return abort(403);
    }
}
