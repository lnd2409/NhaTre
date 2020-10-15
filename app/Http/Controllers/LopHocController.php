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
                foreach ($dsLop as $value) {
                    # code...
                    $giaoVien[$value->lh_id] = DB::table('giaovien')->where('lh_id',$value->lh_id)->get();
                    // echo $giaoVien;
                }

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
        $giaoVien = DB::table('giaovien')->where('lh_id',$idLop)->get();
        $giaoVienSelect = DB::table('giaovien')->get();
        if($tenLop){
            $countStudent = DB::table('hocsinh')->where('lh_id',$idLop)->count();
            if(request()->ajax())
            {
                    return datatables()->of(DB::table('hocsinh')
                        ->where('lh_id',$idLop)->get())
                        ->make(true);
            }
            return view('admin.lophoc.chi-tiet', compact('tenLop', 'countStudent','giaoVien','giaoVienSelect'));
        }else{
            $countStudent = DB::table('hocsinh')->where('lh_id',$idLop)->count();
            $tenLop = DB::table('lophoc')->where('lh_id',$idLop)->first();
            if(request()->ajax())
            {
                    return datatables()->of(DB::table('hocsinh')
                        ->where('lh_id',$idLop)->get())
                        ->make(true);
            }
            return view('admin.lophoc.chi-tiet', compact('tenLop', 'countStudent','giaoVien','giaoVienSelect'));
        }
    }

    public function addTecherInClass(Request $request)
    {
        $giaoVien1 = $request->giaoVien1;
        $giaoVien2 = $request->giaoVien2;
        $lopHoc = $request->lopHoc;
        if($giaoVien1 == $giaoVien2)
        {
            // Session::flash('alert-add-teacher','Giáo viên không được giống nhau');
            dd('Giáo viên không được giống nhau');
        }
        else
        {
            if($giaoVien1 == null)
            {
                DB::table('giaovien')->where('gv_id',$giaoVien2)->update(['lh_id'=>$lopHoc]);
                return redirect()->back();
            }
            else if($giaoVien2 == null)
            {
                DB::table('giaovien')->where('gv_id',$giaoVien1)->update(['lh_id'=>$lopHoc]);
                return redirect()->back();
            }
            else
            {
                DB::table('giaovien')->where('gv_id',$giaoVien1)->update(['lh_id'=>$lopHoc]);
                DB::table('giaovien')->where('gv_id',$giaoVien2)->update(['lh_id'=>$lopHoc]);
                return redirect()->back();
            }
        }

    }
}
