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
        if(!$user || (!$user->hasPermission('bo::read') ) ) {
            return abort(403);
        }
        return $next($request);
    }
}
