<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckVerified2
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
        if (Auth::check()) {
            if (Auth::user()->confirmed === 0) {
                return redirect()->route('home');
            } else {
                return redirect()->route('verify');
            }
        } else {
            return redirect()->route('getLogin');
        }
    }
}
