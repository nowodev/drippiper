<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && $request->user()->type == \App\Enums\UserType::ADMIN->value) {
                return redirect()->intended(RouteServiceProvider::ADMINHOME);
            }

            if (Auth::guard($guard)->check() && $request->user()->type == \App\Enums\UserType::CUSTOMER->value) {
                return redirect()->intended(RouteServiceProvider::CUSTOMERHOME);
            }
        }

        return $next($request);
    }
}
