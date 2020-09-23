<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
class CheckThongTin
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
        $id = Auth::guard('nhatruong')->id();
        $data = DB::table('nhatruong_khoihoc')->where('nt_id', $id)->first();
        if($data){
            return $next($request);
        }else{
            return redirect()->route('nhap-thong-tin');
        }
    }
}
