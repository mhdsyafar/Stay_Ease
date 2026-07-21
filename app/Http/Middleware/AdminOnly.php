<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     * Only allows users with role 'admin' to proceed.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // If logged in as pelanggan, redirect to their portal
            if (Auth::check()) {
                return redirect()->route('pelanggan.dashboard')
                    ->with('error', 'Anda tidak memiliki akses ke halaman admin.');
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
