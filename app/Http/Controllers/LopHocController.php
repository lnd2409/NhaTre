<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class LopHocController extends Controller
{
    public function index($idKhoi)
    {
        $id = Auth::guard('nhatruong')->id();
        switch ($idKhoi) {
            case '1':
                # code...
                $dsLop = DB::table('lophoc')
                        ->where('nt_id',$id)
                        ->where('kh_id',1)
                        // ->join('giaovien','giaovien.gv_id','lophoc.gv_id')
                        ->get();
                $giaoVien = array();
                // foreach ($dsLop as $value) {
                //     # code...
                //     $giaoVien[$value->gv_id] = DB::table('giaovien')->where('gv_id',$value->gv_id)->get();
                // }
                $tenKhoi = DB::table('khoihoc')->where('kh_id',1)->first();
                return view('admin.lophoc.index', compact('dsLop','tenKhoi','giaoVien'));
                break;
            case '2':
                # code...
                $dsLop = DB::table('lophoc')
                        ->where('nt_id',$id)
                        ->where('kh_id',2)
                        ->get();
                $giaoVien = array();
                // foreach ($dsLop as $value) {
                //     # code...
                //     $giaoVien[$value->gv_id] = DB::table('giaovien')->where('gv_id',$value->gv_id)->get();
                // }
                $tenKhoi = DB::table('khoihoc')->where('kh_id',2)->first();
                return view('admin.lophoc.index', compact('dsLop','tenKhoi','giaoVien'));
                break;
            case '3':
                # code...
                $dsLop = DB::table('lophoc')
                        ->where('nt_id',$id)
                        ->where('kh_id',3)
                        ->get();
                $giaoVien = array();
                // foreach ($dsLop as $value) {
                //     # code...
                //     $giaoVien[$value->gv_id] = DB::table('giaovien')->where('gv_id',$value->gv_id)->get();
                // }
                $tenKhoi = DB::table('khoihoc')->where('kh_id',3)->first();
                return view('admin.lophoc.index', compact('dsLop','tenKhoi','giaoVien'));
                break;
        }
    }

    public function studentInClass($idLop)
    {
        $tenLop = DB::table('lophoc')->where('lh_id',$idLop)->first();
        if($tenLop){
            $countStudent = DB::table('hocsinh')->where('lh_id',$idLop)->count();
            if(request()->ajax())
            {
                    return datatables()->of(DB::table('hocsinh')
                        ->where('lh_id',$idLop)->get())
                        ->make(true);
            }
            return view('admin.lophoc.chi-tiet', compact('tenLop', 'countStudent'));
        }else{
            $countStudent = DB::table('hocsinh')->where('lh_id',$idLop)->count();
            $tenLop = DB::table('lophoc')->where('lh_id',$idLop)->first();
            if(request()->ajax())
            {
                    return datatables()->of(DB::table('hocsinh')
                        ->where('lh_id',$idLop)->get())
                        ->make(true);
            }
            return view('admin.lophoc.chi-tiet', compact('tenLop', 'countStudent'));
        }

    }
}
