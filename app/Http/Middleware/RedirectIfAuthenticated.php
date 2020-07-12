<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->status == 2){
                return redirect()->route('admin.index');
            }else{
                Auth::logout();
                return redirect()->route('front.login');
            }
        }

        return $next($request);
    }
}
