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
        $activities = array();
        foreach ($getAct as $value) {
            # code...
            $activities[$value->lhd_id] = DB::table('chitietlichhoatdong')
                                        ->where('lhd_id',$value->lhd_id)
                                        ->join('monhoc','monhoc.mh_id','chitietlichhoatdong.mh_id')
                                        ->get();
        }
        return view('giao-vien.hoat-dong.index', compact('getAct','activities'));
    }

    public function insertImageActive(Request $request)
    {
        if($request->hasFile('hinhAnh'))
        {
            $images = $request->file('hinhAnh');
            foreach ($images as $image) {
                # code...
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/hinh-anh-hoat-dong/', $name);
                // $data[] = $name;
                // echo $name;
                $idAct = $request->idHoatDong;
                $insertImage = DB::table('hinhanhhoatdong')->insert([
                    'ctlhd_id' => $idAct,
                    'hahd_duongdan' => 'hinh-anh-hoat-dong/'.$name
                ]);
            }
            return redirect()->back();
        }
    }

    public function getDetailActive($idActive)
    {
        // $monHoc = DB::table('monhoc')->where('')->first();
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
