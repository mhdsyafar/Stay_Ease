<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PelangganOnly
{
    /**
     * Handle an incoming request.
     * Only allows users with role 'pelanggan' to proceed.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->isPelanggan()) {
            // If logged in as admin, redirect to admin dashboard
            if (Auth::check()) {
                return redirect()->route('dashboard')
                    ->with('error', 'Admin tidak dapat mengakses portal pelanggan.');
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
