<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class LichHoatDongController extends Controller
{
    public function getActive()
    {
        $idPhuHuynh = Auth::guard('phuhuynh')->id();
        // $getClass = DB::table('phuhuynh')->where('gv_id',$idTecher)->first();
        // dd($idPhuHuynh);
        $getHocSinh = DB::table('hocsinh')->where('ph_id',$idPhuHuynh)->first();
        // dd($getHocSinh);
        $getActList = DB::table('lichhoatdong')->where('lh_id',$getHocSinh->lh_id)->paginate(5);
        // $getAct = $getActList['data'];
        // dd($getActList);
        // dd($getAct);
        $activities = array();
        foreach ($getActList as $value) {
            # code...
            $activities[$value->lhd_id] = DB::table('chitietlichhoatdong')
                                        ->where('lhd_id',$value->lhd_id)
                                        ->join('monhoc','monhoc.mh_id','chitietlichhoatdong.mh_id')
                                        ->get();
        }
        // dd($activities);
        // 'getAct',
        return view('phu-huynh.lich-hoat-dong.index', compact('activities','getActList'));
    }

    public function getDetailActive($idActive)
    {
        $getAct = DB::table('chitietlichhoatdong')
                ->where('ctlhd_id',$idActive)
                ->join('monhoc','monhoc.mh_id','chitietlichhoatdong.mh_id')
                ->first();
        $getImage = DB::table('hinhanhhoatdong')
                ->join('chitietlichhoatdong','chitietlichhoatdong.ctlhd_id','hinhanhhoatdong.ctlhd_id')
                ->join('monhoc','monhoc.mh_id','chitietlichhoatdong.mh_id')
                ->where('chitietlichhoatdong.ctlhd_id', $idActive)
                ->get();
        // dd($getAct);
        return response()->json([
            'monHoc' => $getAct,
            'hinhAnh' => $getImage
        ], 200);
    }
}
