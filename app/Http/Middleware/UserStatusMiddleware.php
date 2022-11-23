<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->is_active){
            return $next($request);
        }
        else{
            Auth::logout();
            return redirect()->route('login')->withErrors('You are banned, call administrator!!!');
        }
    }
}
