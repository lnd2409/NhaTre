<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class HocSinhController extends Controller
{
    public function getStudentInClass()
    {
        $idLopHoc = Auth::guard('giaovien')->user()->lh_id;
        $hocSinh = DB::table('hocsinh')->where('lh_id',$idLopHoc)->get();
        return view('giao-vien.quan-ly-hoc-sinh.index',compact('hocSinh'));
    }

    public function soBeNgoan($idStudent)
    {
        $hocSinh = DB::table('hocsinh')->where('hs_id',$idStudent)->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->first();
        return view('giao-vien.quan-ly-hoc-sinh.so-be-ngoan', compact('hocSinh'));
    }
}
