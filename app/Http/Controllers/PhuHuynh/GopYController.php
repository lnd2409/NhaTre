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
        return view('phu-huynh.gop-y.detail', compact('thongBao', 'nguoiNhan'));
    }

    public function create()
    {
        $idPhuHuynh = Auth::guard('phuhuynh')->id();
        $nhaTruong = DB::table('phuhuynh')->where('ph_id',$idPhuHuynh)->first();
        $giaoVien = DB::table('phuhuynh')
                    ->join('hocsinh','hocsinh.ph_id','phuhuynh.ph_id')
                    ->join('giaovien','giaovien.lh_id','hocsinh.lh_id')
                    ->where('phuhuynh.ph_id',$idPhuHuynh)
                    ->get();
        // dd($giaoVien);
        $demBaiViet = DB::table('nguoinhan')->join('thongbao','thongbao.tb_id','nguoinhan.tb_id')
                                        ->where('nguoinhan.nn_id',$idPhuHuynh)
                                        ->where('nn_trangthai',0)
                                        ->count();
        return view('phu-huynh.gop-y.create', compact('demBaiViet', 'nhaTruong','giaoVien'));
    }

    public function handleWrite(Request $request)
    {
        $idPhuHuynh = Auth::guard('phuhuynh')->id();
        $tieuDe = $request->tieuDe;
        $noiDung = $request->noiDungThongBao;
        $nguoiNhan = $request->nguoiNhan;
        if($nguoiNhan == 'giaoVien')
        {
            $giaoVien = DB::table('phuhuynh')
                    ->join('hocsinh','hocsinh.ph_id','phuhuynh.ph_id')
                    ->join('giaovien','giaovien.lh_id','hocsinh.lh_id')
                    ->where('phuhuynh.ph_id',$idPhuHuynh)
                    ->get('giaovien.username');
            // dd($giaoVien);
            # code...
            $thongBao = DB::table('thongbao')->insertGetId([
                'tb_tieude' => $tieuDe,
                'tb_noidung' => $noiDung,
                'tb_ngayviet' => Carbon::now(),
                'ph_id' => $idPhuHuynh,
            ]);

            foreach ($giaoVien as $key => $value) {
                # code...
                DB::table('nguoinhan')->insert(
                    [
                        'tb_id' => $thongBao,
                        'nn_id' => $value->username,
                        'nn_trangthai' => 0
                    ]
                );
            }
        }
        else if($nguoiNhan == 'nhaTruong')
        {
            $nhaTruong = DB::table('phuhuynh')
                        ->join('hocsinh','hocsinh.ph_id','phuhuynh.ph_id')
                        ->join('giaovien','giaovien.lh_id','hocsinh.lh_id')
                        ->join('nhatruong','nhatruong.nt_id','phuhuynh.nt_id')
                        ->where('phuhuynh.ph_id',$idPhuHuynh)
                        ->first();
            // dd($nhaTruong->username);
            $thongBao = DB::table('thongbao')->insertGetId([
                'tb_tieude' => $tieuDe,
                'tb_noidung' => $noiDung,
                'tb_ngayviet' => Carbon::now(),
                'ph_id' => $idPhuHuynh,
            ]);

            DB::table('nguoinhan')->insert(
                [
                    'tb_id' => $thongBao,
                    'nn_id' => $nhaTruong->username,
                    'nn_trangthai' => 0
                ]
            );
        }
        return redirect()->route('phu-huynh.hop-thu-den');
    }

    public function thuDaGui()
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
}
