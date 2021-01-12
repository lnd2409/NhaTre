<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Hash;
class GiaoVienController extends Controller
{

    public function loginGiaoVien(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::guard('giaovien')->attempt($arr)) {
            return redirect()->route('giao-vien.trang-quan-ly');
        } else {
            dd('tài khoản và mật khẩu chưa chính xác');
        }
    }

    public function logout()
    {
        if(Auth::guard('giaovien')->check()){
            Auth::guard('giaovien')->logout();
        }
        return redirect()->route('dang-nhap');
    }

    public function resetPassword($id)
    {
        $resetPassword = DB::table('giaovien')->where('gv_id',$id)->update([
            'password' => Hash::make(123)
        ]);
        Session::flash('alert','Chỉnh sửa thông tin thành công');
        return redirect()->back();
    }

    public function index()
    {
        $id = Auth::guard('nhatruong')->id();
        $danhSachGiaoVienDaCoLop = DB::table('giaovien')
                            ->where('giaovien.nt_id',$id)
                            ->join('lophoc','lophoc.lh_id','giaovien.lh_id')
                            ->orderBy('gv_id','DESC')->get();
        $danhSachGiaoVienChuaCoLop = DB::table('giaovien')
                                ->where('giaovien.nt_id',$id)
                                ->where('lh_id',NULL)
                                // ->join('lophoc','lophoc.lh_id','giaovien.lh_id')
                                ->orderBy('gv_id','DESC')->get();
        return view('admin.giaovien.index', compact('danhSachGiaoVienDaCoLop','danhSachGiaoVienChuaCoLop'));
    }

    public function themGiaoVien()
    {
        return view('admin.giaovien.them-giao-vien');
    }

    public function xuLyThemGiaoVien(Request $request)
    {
        $id = Auth::guard('nhatruong')->id();
        $hoTen = $request->hoTen;
        $sdt = $request->sdt;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $bangCap = $request->bangCap;
        $explode_fullname = explode('-', str_slug($hoTen));
        $last_name = $explode_fullname[count($explode_fullname)-1];

        #địa chỉ
        $diaChi = $request->tenDuong.', '.$request->phuongXa.','.$request->quanHuyen.', '.$request->thanhPho;
        // $avata = $request
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien')->getClientOriginalName();
            $request->file('anhDaiDien')->move(public_path('hinh-anh-giao-vien/anh-dai-dien/'),$file);
            $addGiaoVien = DB::table('giaovien')->insert(
                [
                    'gv_ten' => $hoTen,
                    'username' => $last_name.rand(1,999),
                    'gv_diachi' => $diaChi,
                    'gv_sdt' => $sdt,
                    'gv_ngaysinh' => $ngaySinh,
                    'gv_gioitinh' => $gioiTinh,
                    'gv_bangcap' => $bangCap,
                    'gv_avata' => $file,
                    'nt_id' => $id,
                ]
            );
        }
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
        $bangCap = $request->bangCap;
        $giaoVien = DB::table('giaovien')->where('gv_id', $request->idGiaoVien)->update([
            'gv_ten' => $hoTen,
            'gv_diachi' => $diaChi,
            'gv_sdt' => $sdt,
            'gv_ngaysinh' => $ngaySinh,
            'gv_gioitinh' => $gioiTinh,
            'gv_bangcap' => $bangCap
        ]);
        Session::flash('alert','Chỉnh sửa thông tin thành công');
        return redirect()->back();
    }

    public function capNhatAnhDaiDien(Request $request)
    {
        if ($request->hasFile('anhDaiDien')) {
            $id = $request->idGiaoVien;
            $file = $request->file('anhDaiDien')->getClientOriginalName();
            $request->file('anhDaiDien')->move(public_path('hinh-anh-giao-vien/anh-dai-dien/'),$file);
            $edit = DB::table('giaovien')->where('gv_id',$id)->update(
                [
                    'gv_avata' => $file
                ]
            );
            Session::flash('alert','Chỉnh sửa thông tin thành công');
            return redirect()->back();
        }else{
            Session::flash('alert','Chưa chọn ảnh thay thế');
            return redirect()->back();
        }
    }

    public function thayDoiTrangThaiGiaoVien($id)
    {

    }
}
