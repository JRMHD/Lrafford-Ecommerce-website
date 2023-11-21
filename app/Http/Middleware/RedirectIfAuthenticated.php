<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check if the user is authenticated and email is verified
                if (Auth::guard($guard)->user()->email_verified_at) {
                    return redirect(RouteServiceProvider::HOME);
                } else {
                    // User is not verified, redirect to the email verification notice
                    return redirect()->route('verification.notice');
                }
            }
        }

        return $next($request);
    }
}
