<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOperator
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
        if (!in_array($request->user()->level,['admin' ,'operator' ,'qc' ])){
            return  redirect(route('login'));
        }
        return $next($request);
    }
}
