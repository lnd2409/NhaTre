<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class GiaoVienController extends Controller
{
    public function index()
    {
        $idLopHoc = Auth::guard('giaovien')->user()->lh_id;
        $hocSinh = DB::table('hocsinh')->where('lh_id',$idLopHoc)->get();
        $hocSinhNam = DB::table('hocsinh')->where('lh_id',$idLopHoc)->where('hs_gioitinh',1)->count();
        $hocSinhNu = DB::table('hocsinh')->where('lh_id',$idLopHoc)->where('hs_gioitinh',0)->count();
        $hocSinh = DB::table('hocsinh')->where('lh_id',$idLopHoc)->get();
        // dd($lopHoc);
        return view('giao-vien.index',compact('hocSinh','hocSinhNam','hocSinhNu','hocSinh'));
    }

    public function logout()
    {
        if (Auth::guard('giaovien')->check()) {
            # code...
            Auth::guard('giaovien')->logout();
            return redirect()->route('login-giao-vien');
        }
    }
}
