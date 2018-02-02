<?php

namespace App\Http\Middleware;

use App\ElectionLog;
use Closure;

class Election_isstarted
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
        if(ElectionLog::latest()->first()->date_ended == null)
            return $next($request);

        return redirect('/profile');
    }
}
