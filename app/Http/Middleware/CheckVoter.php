<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckVoter
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

        if(!session('voterData')){
            return redirect('e-voting/'.session('slug') . '/login');
        }

        return $next($request);
    }
}
