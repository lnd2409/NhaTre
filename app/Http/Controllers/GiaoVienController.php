<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class GiaoVienController extends Controller
{
    public function index()
    {
        $id = Auth::guard('nhatruong')->id();
        $danhSachGiaoVien = DB::table('giaovien')->where('nt_id',$id)->get();
        return view('admin.giaovien.index', compact('danhSachGiaoVien'));
    }

    public function themGiaoVien()
    {
        return view('admin.giaovien.them-giao-vien');
    }

    public function xuLyThemGiaoVien(Request $request)
    {
        $id = Auth::guard('nhatruong')->id();
        $hoTen = $request->hoTen;
        $diaChi = $request->diaChi;
        $sdt = $request->sdt;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $addGiaoVien = DB::table('giaovien')->insert(
            [
                'gv_ten' => $hoTen,
                'gv_diachi' => $diaChi,
                'gv_sdt' => $sdt,
                'gv_ngaysinh' => $ngaySinh,
                'gv_gioitinh' => $gioiTinh,
                'nt_id' => $id,
            ]
        );
        return redirect()->route('danh-sach-giao-vien');
    }

    public function chiTietGiaoVien($id)
    {
        $giaoVien = DB::table('giaovien')->where('gv_id',$id)->first();
        return response()->json($giaoVien, 200);
    }


    public function xuLySuaGiaoVien(Request $request)
    {
        $hoTen = $request->hoTen;
        $diaChi = $request->diaChi;
        $sdt = $request->sdt;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $giaoVien = DB::table('giaovien')->where('gv_id', $request->idGiaoVien)->update([
            'gv_ten' => $hoTen,
            'gv_diachi' => $diaChi,
            'gv_sdt' => $sdt,
            'gv_ngaysinh' => $ngaySinh,
            'gv_gioitinh' => $gioiTinh,
        ]);
        Session::flash('alert','Chỉnh sửa thông tin thành công');
        return redirect()->back();
    }

    public function xoaGiaoVien($id)
    {

    }
}
