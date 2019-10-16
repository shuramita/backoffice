<?php

namespace Shura\BackOffice\Middleware;

use Closure;

class BackOffice
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
        $user = $request->user();
        if(!$user || (!$user->isAdmin() && !$user->isManager() && !$user->isMaker()) ) {
            return redirect('/');
        }
        return $next($request);
    }
}
