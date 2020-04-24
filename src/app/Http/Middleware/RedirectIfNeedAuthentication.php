<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNeedAuthentication
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
        if (! Auth::check()) {
            return redirect()->route('logout')->withErrors('Для перегляду необхідно ввійти в систему');
        }

        return $next($request);
    }
}
