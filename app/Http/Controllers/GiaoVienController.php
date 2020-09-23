<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GiaoVienController extends Controller
{
    public function index()
    {
        $danhSachGiaoVien = DB::table('giaovien')->get();
        return view('admin.giaovien.index', compact('danhSachGiaoVien'));
    }

    public function themGiaoVien(Request $request)
    {

        return view('admin.giaovien.them-giao-vien');
    }

    public function xuLyThemGiaoVien(Request $request)
    {
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
                'nt_id' => 1,
            ]
        );
        // dd('re');
        return redirect()->route('danh-sach-giao-vien');
    }

    public function chiTietGiaoVien($id)
    {
        return view('admin.giaovien.chi-tiet');
    }

    public function xoaGiaoVien($id)
    {

    }
}
