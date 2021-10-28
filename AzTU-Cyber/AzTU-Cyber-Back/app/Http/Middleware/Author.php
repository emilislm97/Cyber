<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Author
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
        if(auth()->user()->roles == 'Author')
        {
            return redirect()->route('index');
        }
        return $next($request);
    }
}
