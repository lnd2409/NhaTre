<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ThucDonController extends Controller
{
    public function viewThucDon()
    {
        $idSchool = Auth::guard('nhatruong')->id();
        $monAn = DB::table('monan')->where('nt_id',$idSchool)->get();
        $thucDon = DB::table('thucdon_monan')
                    ->join('thucdon','thucdon.td_id','thucdon_monan.td_id')
                    ->join('monan','monan.ma_id','thucdon_monan.ma_id')
                    ->where('thucdon.nt_id',$idSchool)->get();
        // dd($thucDon);
        return view('admin.thucdon.thuc-don', compact('monAn','thucDon'));
    }

    public function addThucDon(Request $request)
    {
        $idSchool = Auth::guard('nhatruong')->id();
        // dd($request->monAn);
        $insertThucDon = DB::table('thucdon')->insertGetId([
            'td_ngayapdung' => $request->ngayApDung,
            'nt_id' => $idSchool,
        ]);
        $monAn = $request->monAn;
        foreach ($monAn as $item) {
            # code...
            DB::table('thucdon_monan')->insert([
                'td_id' => $insertThucDon,
                'ma_id' => $item
            ]);
            // print_r($item);
        }
        return redirect()->back();
    }
}
