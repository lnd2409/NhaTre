<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckPhuHuynh
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
        if (Auth::guard('phuhuynh')->check()) {
            # code...
            return $next($request);
        }
        return redirect()->route('login-phu-huynh');
    }
}
