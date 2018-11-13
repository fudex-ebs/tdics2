<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckHasPcQuiz
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
        if ( Auth::check() && !Auth::user()->has_quiz() ) {
            return redirect('/account');
        }
        return $next($request);
    }
}
