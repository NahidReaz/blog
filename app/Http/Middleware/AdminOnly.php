<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*if (auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        abort_if(auth()->user()?->username !== 'nahidreaz',Response::HTTP_FORBIDDEN);*/

        return $next($request);
    }
}
