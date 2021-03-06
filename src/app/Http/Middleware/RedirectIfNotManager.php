<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Auth;

class RedirectIfNotManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->isManager()) {
            return $next($request);
        }
        else {
            return redirect(RouteServiceProvider::HOME)->withErrors('У вас недостатньо прав для перегляду цієї сторінки');
        }
    }
}
