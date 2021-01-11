<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AdminController extends Controller
{
    public function index()
    {
        $id = Auth::guard('nhatruong')->id();
        $lopMam = DB::table('lophoc')->where('kh_id',1)->where('nt_id',$id)->count();
        $lopChoi = DB::table('lophoc')->where('kh_id',2)->where('nt_id',$id)->count();
        $lopLa = DB::table('lophoc')->where('kh_id',3)->where('nt_id',$id)->count();
        $hocSinh = DB::table('hocsinh')->join('lophoc','lophoc.lh_id','hocsinh.lh_id')->where('nt_id',$id)->where('hs_trangthaitienhoc',NULL)->get();
        dd($hocSinh);
        return view('admin.index', compact('lopMam','lopChoi','lopLa','hocSinh'));
    }
}
