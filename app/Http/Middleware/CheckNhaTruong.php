<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckNhaTruong
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
        if (Auth::guard('nhatruong')->check()) {
            // if(Auth::guard('nhatruong')->user()->nt_trangthai == 1) {
                # code...
                return $next($request);
            // }
        }
        return redirect()->route('dang-nhap');

    }
}
