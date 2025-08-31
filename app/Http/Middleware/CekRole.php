<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        // cek apakah user login dengan guard pegawai
        $user = Auth::guard('pegawai')->user();

        if ($role && $user->role !== $role) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
