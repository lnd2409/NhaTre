<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckGiaoVien
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
        if (Auth::guard('giaovien')->check()) {
            # code...
            return $next($request);
        }
        return redirect()->route('login-giao-vien');
    }
}
