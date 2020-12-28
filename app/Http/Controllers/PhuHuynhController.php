<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PhuHuynhController extends Controller
{
    public function phuHuynh()
    {
        $id = Auth::guard('nhatruong')->id();
        $danhSachPhuHuynh = DB::table('phuhuynh')->where('nt_id',$id)->get();
        // dd($danhSachPhuHuynh);
        return view('admin.phuhuynh.index', compact('danhSachPhuHuynh'));
    }

    public function themPhuHuynh()
    {
        return view('admin.phuhuynh.add');
    }

    public function xuLyThemPhuHuynh(Request $request)
    {
        $id = Auth::guard('nhatruong')->id();
        $hoTen = $request->hoTen;
        $sdt = $request->sdt;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $ngheNghiep = $request->ngheNghiep;
        $explode_fullname = explode('-', str_slug($hoTen));
        $last_name = $explode_fullname[count($explode_fullname)-1];

        #địa chỉ
        $diaChi = $request->tenDuong.', '.$request->phuongXa.','.$request->quanHuyen.', '.$request->thanhPho;
        // $avata = $request
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien')->getClientOriginalName();
            $request->file('anhDaiDien')->move(public_path('phu-huynh/anh-dai-dien/'),$file);
            $addGiaoVien = DB::table('phuhuynh')->insert(
                [
                    'ph_hoten' => $hoTen,
                    'username' => $last_name.rand(1,999),
                    'ph_diachi' => $diaChi,
                    'ph_sdt' => $sdt,
                    'ph_ngaysinh' => $ngaySinh,
                    'ph_gioitinh' => $gioiTinh,
                    'ph_nghenghiep' => $ngheNghiep,
                    'ph_avata' => $file,
                    'nt_id' => $id,
                ]
            );
        }
        return redirect()->route('hocsinh.them-hoc-sinh');
    }
}
