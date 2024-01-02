<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the token exists in the request or session or any other storage mechanism
        $token = Session::get('token');
        $tokenExpiry = Session::get('token_expiry');

        if (!$token || Carbon::now()->gt($tokenExpiry)) {
            return redirect()->route('signin'); // Redirect to the login route
        }

        return $next($request);
    }
}
