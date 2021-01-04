<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class ThucDonController extends Controller
{
    public function thucDon()
    {
        $idPhuHuynh = Auth::guard('phuhuynh')->id();
        $getHocSinh = DB::table('hocsinh')->where('ph_id',$idPhuHuynh)->first();
        $nhaTruong = DB::table('lophoc')
                    ->join('nhatruong','nhatruong.nt_id','lophoc.lh_id')
                    ->where('lh_id',$getHocSinh->lh_id)
                    ->first();
        $thucDon = DB::table('thucdon_monan')
        ->join('thucdon','thucdon.td_id','thucdon_monan.td_id')
        ->join('monan','monan.ma_id','thucdon_monan.ma_id')
        ->where('thucdon.nt_id',$nhaTruong->nt_id)->paginate(5);
        // dd($thucDon);
        // dd($thucDon);
        return view('phu-huynh.thuc-don.index', compact('thucDon'));
    }
}
