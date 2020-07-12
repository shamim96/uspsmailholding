<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            Session::flash('msg-danger','Please login first!');
            Session::put('oldUrl',$request->url());
            return redirect()->route('front.login');
        }elseif(Auth::user()->status != 2){
            Session::flash('msg,danger','Your account not approve yet!');
            Auth::logout();
            return redirect()->route('front.login');
        }
        return $next($request);
    }
}
