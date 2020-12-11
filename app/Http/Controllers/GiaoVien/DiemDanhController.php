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
        $ngayHienTai = DB::table('diemdanh')->where('lh_id',Auth::guard('giaovien')->user()->lh_id)->orderBy('dd_ngay','DESC')->first();
        $danhSachDiemDanh = DB::table('diemdanh')->where('lh_id',Auth::guard('giaovien')->user()->lh_id)->orderBy('dd_ngay','DESC')->get();
        $chiTiet = array();
        foreach ($danhSachDiemDanh as $value) {
            # code...
            $chiTiet[$value->dd_id] = DB::table('chitietdiemdanh')
                                    ->where('dd_id',$value->dd_id)
                                    ->where('ctdd_trangthai',NULL)
                                    ->first();
            // dd($ngayNghi);
        }
        return view('giao-vien.diemdanh.index', compact('danhSachDiemDanh','ngayHienTai','chiTiet'));
    }

    public function viewFillAttendance()
    {
        $ngayHienTai = Carbon::now();
        $giaoVien = Auth::guard('giaovien')->user()->lh_id;
        $lopHoc = DB::table('lophoc')->where('lh_id',$giaoVien)->first();
        $idClass = $lopHoc->lh_id;
        #kiểm tra
        $checkDiemDanh = DB::table('diemdanh')->where('lh_id',Auth::guard('giaovien')->user()->lh_id)->where('dd_ngay',$ngayHienTai->format('Y-m-d'))->first();
        // dd($checkDiemDanh);
        $hocSinh = DB::table('hocsinh')->where('lh_id',$idClass)->get();
        if ($checkDiemDanh == null) {
            $taoDiemDanh = DB::table('diemdanh')->insertGetId(
                [
                    'dd_ngay' => $ngayHienTai,
                    'lh_id' => $lopHoc->lh_id
                ]
            );

            $idClass = DB::table('diemdanh')->where('lh_id', $lopHoc->lh_id)->first();
            $getIDClass = $idClass->lh_id;
            $idClass = $getIDClass;
            foreach ($hocSinh as $key => $value) {
                # code...
                $taoChiTietDiemDanh = DB::table('chitietdiemdanh')->insert(
                    [
                        'dd_id' => $taoDiemDanh,
                        'hs_id' => $value->hs_id,
                    ]
                );
            }
        }

        $chiTiet = array();
        foreach ($hocSinh as $value) {
            # code...
            $chiTiet[$value->hs_id] = DB::table('chitietdiemdanh')
                                    ->where('dd_id', $taoDiemDanh)
                                    ->where('hs_id',$value->hs_id)
                                    ->first();
        }
        return view('giao-vien.diemdanh.fill',compact('hocSinh','chiTiet'));
    }

    public function fillAttendance($idStudent, $trangThai, $idDiemDanh)
    {
        $chiTietDiemDanh = DB::table('chitietdiemdanh')
                        ->where('dd_id', $idDiemDanh)
                        ->where('hs_id',$idStudent)->update(
                                [
                                    'ctdd_giovaolop' => Carbon::now()->hour.':'.Carbon::now()->minute, //giờ-phút
                                    'ctdd_trangthai' => $trangThai
                                ]
                            );
        #return JSON
        // return response()->json('Success', 200);
        return redirect()->back();
    }

    public function attendanceDetail($idDiemDanh)
    {
        $ngayHienTai = Carbon::now();
        $giaoVien = Auth::guard('giaovien')->user()->lh_id;
        $lopHoc = DB::table('lophoc')->where('lh_id',$giaoVien)->first();
        $idClass = $lopHoc->lh_id;
        #kiểm tra
        $checkDiemDanh = DB::table('diemdanh')->where('dd_id',$idDiemDanh)->first();
        // dd($checkDiemDanh);
        $hocSinh = DB::table('hocsinh')->where('lh_id',$checkDiemDanh->lh_id)->get();
        $chiTiet = array();
        foreach ($hocSinh as $value) {
            # code...
            $chiTiet[$value->hs_id] = DB::table('chitietdiemdanh')->where('dd_id',$idDiemDanh)->where('hs_id',$value->hs_id)->first();
        }
        return view('giao-vien.diemdanh.detail',compact('hocSinh','chiTiet','idDiemDanh'));
    }
}
