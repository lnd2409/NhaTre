<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class GopYController extends Controller
{
    public function getAlert()
    {
        $nhaTruong = Auth::guard('nhatruong')->user()->username;
        // $idLopHoc = Auth::guard('giaovien')->user()->lh_id;
        // $giaoVien = DB::table('giaovien')->where('lh_id',$idLopHoc)->pluck('username');
        $baiViet = DB::table('nguoinhan')
                    ->where('nn_id',$nhaTruong)
                    ->join('thongbao','thongbao.tb_id','nguoinhan.tb_id')
                    ->get();
        // dd($baiViet);
        return view('admin.gopy.index', compact('baiViet'));
    }
}
