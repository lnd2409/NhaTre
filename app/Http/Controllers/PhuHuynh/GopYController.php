<?php

namespace App\Http\Controllers\PhuHuynh;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GopYController extends Controller
{
    public function hopThuDen()
    {
        $idPhuHuynh = Auth::guard('phuhuynh')->user()->username;
        $baiViet = DB::table('nguoinhan')->join('thongbao','thongbao.tb_id','nguoinhan.tb_id')
                                        ->where('nguoinhan.nn_id',$idPhuHuynh)
                                        ->join('giaovien','giaovien.gv_id','thongbao.gv_id')
                                        ->orderBy('tb_ngayviet','desc')
                                        ->orderBy('nguoinhan.nn_trangthai','asc')
                                        ->get();
        // dd($baiViet);
        $demBaiViet = DB::table('nguoinhan')->join('thongbao','thongbao.tb_id','nguoinhan.tb_id')
                                        ->where('nguoinhan.nn_id',$idPhuHuynh)
                                        ->where('nn_trangthai',0)
                                        ->count();
        return view('phu-huynh.gop-y.index', compact('baiViet','demBaiViet'));
    }

    public function docThuDen($idThu)
    {
        $username = Auth::guard('phuhuynh')->user()->username;
        $thongBao = DB::table('thongbao')->where('tb_id',$idThu)
                    ->join('giaovien','giaovien.gv_id','thongbao.gv_id')
                    ->first();
        $getNguoiNhan = DB::table('nguoinhan')->where('tb_id',$idThu)->pluck('nn_id');
        $nguoiNhan = DB::table('phuhuynh')->whereIn('username',$getNguoiNhan)->get();
        $changeStatus = DB::table('nguoinhan')->where('tb_id',$idThu)->where('nn_id',$username)->update(
            [
                'nn_trangthai' => 1
            ]
        );

        $phanHoi = DB::table('thongbao')->where('tb_phanhoi',$idThu)
                    ->leftJoin('phuhuynh','phuhuynh.ph_id','thongbao.ph_id')
                    ->leftJoin('giaovien','giaovien.gv_id','thongbao.gv_id')
                    ->leftJoin('nhatruong','nhatruong.nt_id','thongbao.nt_id')
                    ->get();
        // dd($phanHoi);
        return view('phu-huynh.gop-y.detail', compact('thongBao', 'nguoiNhan','phanHoi'));
    }

    public function phanHoi(Request $request ,$idThu)
    {
        $idNguoiPhanHoi = Auth::guard('phuhuynh')->user()->username;
        $getThongBaoGiaoVien = DB::table('thongbao')->where('tb_id',$idThu)
                            // ->join('phuhuynh','phuhuynh.ph_id','thongbao.ph_id')
                            ->join('giaovien','giaovien.gv_id','thongbao.gv_id')
                            // ->join('nhatruong','nhatruong.nt_id','thongbao.nt_id')
                            ->first();
        $getThongBaoNhaTruong = DB::table('thongbao')->where('tb_id',$idThu)
                            // ->join('phuhuynh','phuhuynh.ph_id','thongbao.ph_id')
                            // ->join('giaovien','giaovien.gv_id','thongbao.gv_id')
                            ->join('nhatruong','nhatruong.nt_id','thongbao.nt_id')
                            ->first();
        // dd($getThongBao);
        $gopY = DB::table('thongbao')->insertGetId(
            [
                'tb_noidung' => $request->noiDungThongBao,
                'tb_ngayviet' => Carbon::now(),
                'ph_id' => Auth::guard('phuhuynh')->id(),
                'tb_phanhoi' => $idThu
            ]
        );

        #reply giáo viên
        if ($getThongBaoGiaoVien) {
            # code...
            // dd($getThongBao->gv_id);
            $nguoiNhan = DB::table('nguoinhan')->insert(
                [
                    'tb_id' => $gopY,
                    'nn_id' => $getThongBaoGiaoVien->username,
                    'nn_trangthai' => 0
                ]
            );
            $changeStatus = DB::table('nguoinhan')->where('tb_id', $idThu)->where('nn_id', '<>',$idNguoiPhanHoi)->update(
                [
                    'nn_trangthai' => 0
                ]
            );
            return redirect()->back();
        }

        #reply nhà trường
        if($getThongBaoNhaTruong->nt_id && $getThongBaoNhaTruong)
        {

        }
    }
}
