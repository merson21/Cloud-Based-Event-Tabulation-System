<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckJudge
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
        if(!session('judgeData')){
            return redirect('tabulation/'.session('slug') . '/login');
        }

        return $next($request);
    }
}
