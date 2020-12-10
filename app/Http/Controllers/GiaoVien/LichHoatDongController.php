<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
class LichHoatDongController extends Controller
{
    public function getHoatDong()
    {
        $idTecher = Auth::guard('giaovien')->id();
        $getClass = DB::table('giaovien')->where('gv_id',$idTecher)->first();
        $getAct = DB::table('lichhoatdong')->where('lh_id',$getClass->lh_id)->get()->toArray();

        # code...
        // $activities = DB::table('lophoc')
        // ->where('nt_id',$id)
        // ->where('kh_id',1)
        // // ->join('giaovien','giaovien.gv_id','lophoc.gv_id')
        // ->get();
        $activities = array();
        foreach ($getAct as $value) {
            # code...
            $activities[$value->lhd_id] = DB::table('chitietlichhoatdong')
                                        ->where('lhd_id',$value->lhd_id)
                                        ->join('monhoc','monhoc.mh_id','chitietlichhoatdong.mh_id')
                                        ->get();
        }
        // dd($activities);
        // $day = new Carbon();
        // $day->addDays(7);
        // dd($day);
        // dd($getAct);
        return view('giao-vien.hoat-dong.index', compact('getAct','activities'));
    }
}
