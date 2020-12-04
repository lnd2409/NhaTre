<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Carbon\Carbon;
class DiemDanhController extends Controller
{
    public function index()
    {
        $danhSachDiemDanh = DB::table('diemdanh')->where('lh_id',Auth::guard('giaovien')->user()->lh_id)->orderBy('dd_ngay','DESC')->get();
        return view('giao-vien.diemdanh.index', compact('danhSachDiemDanh'));
    }

    public function viewFillAttendance()
    {
        $ngayHienTai = Carbon::now();
        $giaoVien = Auth::guard('giaovien')->user()->lh_id;
        $lopHoc = DB::table('lophoc')->where('lh_id',$giaoVien)->first();
        $idClass = $lopHoc->lh_id;
        #kiểm tra
        $checkDiemDanh = DB::table('diemdanh')->where('dd_ngay',$ngayHienTai->format('Y-m-d'))->first();
        // dd($checkDiemDanh);
        if ($checkDiemDanh == null) {
            $taoDiemDanh = DB::table('diemdanh')->insert(
                [
                    'dd_ngay' => $ngayHienTai,
                    'lh_id' => $lopHoc->lh_id
                ]
            );

            $idClass = DB::table('diemdanh')->where('lh_id', $lopHoc->lh_id)->first();
            $getIDClass = $idClass->lh_id;
            $idClass = $getIDClass;
        }
        $hocSinh = DB::table('hocsinh')->where('lh_id',$idClass)->get();
        $chiTiet = array();
        foreach ($hocSinh as $value) {
            # code...
            $chiTiet[$value->hs_id] = DB::table('chitietdiemdanh')->where('hs_id',$value->hs_id)->first();
            // dd($ngayNghi);
        }
        // dd($chiTiet);
        // $hocSinh = DB::table('')
        // dd($hocSinh);
        return view('giao-vien.diemdanh.fill',compact('hocSinh','chiTiet'));
    }

    public function fillAttendance($idStudent, $trangThai, $idClass)
    {
        $ngayHienTai = Carbon::now();
        #check null
        $checkDiemDanh = DB::table('diemdanh')->where('dd_ngay',$ngayHienTai->format('Y-m-d'))->first();
        $getIDDiemDanh = $checkDiemDanh->dd_id;
        // dd($checkDiemDanh);
        if ($checkDiemDanh == null) {
            # code...
            $taoDiemDanh = DB::table('diemdanh')->insertGetId(
                [
                    'dd_ngay' => $ngayHienTai,
                    'lh_id' => $idClass
                ]
            );
            $getIDDiemDanh = $taoDiemDanh;
        }
        $chiTietDiemDanh = DB::table('chitietdiemdanh')->insert(
            [
                'dd_id' => $getIDDiemDanh,
                'hs_id' => $idStudent,
                'ctdd_giovaolop' => Carbon::now()->hour.':'.Carbon::now()->minute, //giờ-phút
                'ctdd_trangthai' => $trangThai
            ]
        );
        #return JSON
        // return response()->json('Success', 200);
        return redirect()->back();
    }
}
