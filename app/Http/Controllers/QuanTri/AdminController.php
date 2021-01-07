<?php

namespace App\Http\Controllers\QuanTri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class AdminController extends Controller
{
    public function getSchool()
    {
        $data = DB::table('nhatruong')->get();
        $location = DB::table('nhatruong')->distinct('nt_thanhpho')->pluck('nt_thanhpho');
        // foreach ($data as $value) {
        //     # code...
        //     $location[$value->nt_thanhpho] = DB::table('nhatruong')->where('nt_thanhpho',$value->nt_thanhpho)->count();
        // }
        return view('admin-he-thong.index', compact('data','location'));
    }

    public function schoolDetail($id)
    {
        $data = DB::table('nhatruong')->where('nt_id',$id)->first();
        $lopHoc = DB::table('lophoc')->where('nt_id',$id)->count();
        $hocSinh = DB::table('hocsinh')->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->count();
        $giaoVien = DB::table('giaovien')->where('nt_id',$id)->count();
        // dd($hocSinh);
        return view('admin-he-thong.school', compact('data','lopHoc','hocSinh','giaoVien'));
    }

    public function blockSchool($id)
    {
        $blocking = DB::table('nhatruong')->where('nt_id',$id)->update(
            [
                'nt_trangthai' => 0
            ]
        );
        return redirect()->back();
    }

    public function acceptSchool($id)
    {
        $accept = DB::table('nhatruong')->where('nt_id',$id)->update(
            [
                'nt_trangthai' => 1
            ]
        );
        return redirect()->back();
    }
}
