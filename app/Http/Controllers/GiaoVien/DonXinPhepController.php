<?php

namespace App\Http\Controllers\GiaoVien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
class DonXinPhepController extends Controller
{
    public function index()
    {
        $giaoVien = Auth::guard('giaovien')->id();
        $lopHoc = DB::table('giaovien')->where('gv_id',$giaoVien)->first();
        // dd($lopHoc);
        $donXinPhep = DB::table('donxinphep')
                                ->join('hocsinh','hocsinh.hs_id','donxinphep.hs_id')
                                ->join('lophoc','lophoc.lh_id','hocsinh.lh_id')
                                ->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')
                                ->where('lophoc.nt_id',$lopHoc->lh_id)
                                ->where('dxp_trangthai',0)->get();
        // dd($donXinPhep);
        $ngayNghi = array();
        foreach ($donXinPhep as $value) {
            # code...
            $ngayNghi[$value->dxp_id] = DB::table('chitietdonxinphep')->where('dxp_id',$value->dxp_id)->get();
            // dd($ngayNghi);
        }
        return view('giao-vien.donxinphep.index',compact('donXinPhep','ngayNghi'));
    }
}
