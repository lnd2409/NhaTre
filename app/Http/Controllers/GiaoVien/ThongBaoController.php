<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
class ThongBaoController extends Controller
{

    //đã gửi
    public function viewNotifi()
    {
        $idLopHoc = Auth::guard('giaovien')->user()->lh_id;
        $giaoVien = DB::table('giaovien')->where('lh_id',$idLopHoc)->pluck('username');
        $baiViet = DB::table('nguoinhan')->whereIn('nn_id',$giaoVien)->join('thongbao','thongbao.tb_id','nguoinhan.tb_id')->get();
        // dd($baiViet);
        return view('giao-vien.thong-bao.index', compact('baiViet'));

    }

    public function postSended()
    {
        $idClass = Auth::guard('giaovien')->user()->lh_id;
        $baiViet = DB::table('thongbao')->join('giaovien','giaovien.gv_id','thongbao.gv_id')
                    // ->where('gv_id',1)
                    ->join('lophoc','lophoc.lh_id','giaovien.lh_id')
                    ->where('lophoc.lh_id',$idClass)
                    ->get();
        return view('giao-vien.thong-bao.index', compact('baiViet'));
    }

    public function writePost()
    {
        $idLopHoc = Auth::guard('giaovien')->user()->lh_id;
        // dd($lopHoc);
        $phuHuynh = DB::table('hocsinh')->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->where('lh_id',$idLopHoc)
                    ->select('phuhuynh.ph_id','phuhuynh.ph_hoten','phuhuynh.username')->distinct()->get();
        return view('giao-vien.thong-bao.write-alert', compact('phuHuynh'));
    }

    public function postHandle(Request $request)
    {
        $idTeacher = Auth::guard('giaovien')->id();
        $tieuDe = $request->tieuDe;
        $noiDung = $request->noiDungThongBao;
        $nguoiNhan = $request->phuHuynh;
        $thongBao = DB::table('thongbao')->insertGetId([
            'tb_tieude' => $tieuDe,
            'tb_noidung' => $noiDung,
            'tb_ngayviet' => Carbon::now(),
            'gv_id' => $idTeacher,
        ]);
        foreach ($nguoiNhan as $key => $value) {
            # code...
            DB::table('nguoinhan')->insert(
                [
                    'tb_id' => $thongBao,
                    'nn_id' => $value,
                    'nn_trangthai' => 0
                ]
            );
        }
        return redirect()->route('giao-vien.thong-bao');
    }

    public function postDetail($idPost)
    {
        $thongBao = DB::table('thongbao')->where('tb_id',$idPost)
                    ->join('giaovien','giaovien.gv_id','thongbao.gv_id')
                    ->first();
        $getNguoiNhan = DB::table('nguoinhan')->where('tb_id',$idPost)->pluck('nn_id');
        $nguoiNhan = DB::table('phuhuynh')->whereIn('username',$getNguoiNhan)->get();
        return view('giao-vien.thong-bao.chi-tiet-thong-bao', compact('thongBao', 'nguoiNhan'));
    }
}
