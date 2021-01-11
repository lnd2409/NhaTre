<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class DanhGiaController extends Controller
{
    public function viewDanhGia()
    {
        $review = DB::table('danhgia')->where('ph_id',Auth::guard('phuhuynh')->id())->first();
        return view('phu-huynh.danh-gia.index',compact('review'));
    }

    public function handleRating(Request $request)
    {
        $id = Auth::guard('phuhuynh')->user()->nt_id;
        $core = $request->diemSo;
        $content = $request->noiDung;
        $count = DB::table('danhgia')->where('nt_id',$id)->count();
        // dd($count); $count + 1;
        $oldCore = DB::table('nhatruong')->where('nt_id',$id)->first();
        $totalCore = $oldCore->nt_danhgia + $core;
        $coreRate = $totalCore / ($count + 1);
        // dd($coreRate);
        $handleUpdateSchoolCore = DB::table('nhatruong')->where('nt_id',$id)
                ->update([
                    'nt_danhgia' => $coreRate
                ]);
        $handleMakeRate = DB::table('danhgia')->insert(
            [
                'dg_diem' => $core,
                'dg_noidung' => $content,
                'nt_id' => $id,
                'ph_id' => Auth::guard('phuhuynh')->id()
            ]
        );
        return redirect()->back();
    }
}
