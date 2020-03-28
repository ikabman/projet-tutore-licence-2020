<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateEtu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (! ($guard == "etudiant" && Auth::guard($guard)->check())) {
            return redirect('/login/etudiant');
        }

        return $next($request);
    }
}
