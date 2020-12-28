<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class MonHocController extends Controller
{
    public function index()
    {
        $idShool = Auth::guard('nhatruong')->id();
        $monHoc = DB::table('monhoc')->where('nt_id',$idShool)->get();
        return view('admin.monhoc.index', compact('monHoc'));
    }

    public function store(Request $request)
    {
        $idSchool = Auth::guard('nhatruong')->id();
        $hocKyNamHoc = DB::table('hocky_namhoc')
                        ->where('trangthai', 1)
                        ->where('nt_id', $idSchool)
                        ->first();
        $tenMonHoc = $request->tenMonHoc;
        $insert = DB::table('monhoc')->insert([
            'mh_tenmon' => $tenMonHoc,
            'nt_id' => $idSchool,
            'hknh_id' => $hocKyNamHoc->hknh_id,
            'mh_mota' => $request->moTa
        ]);

        return redirect()->back();
    }
}
