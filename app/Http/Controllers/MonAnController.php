<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class MonAnController extends Controller
{
    public function viewFood()
    {
        $idShool = Auth::guard('nhatruong')->id();
        $monAn = DB::table('monan')->where('nt_id',$idShool)->orderBy('ma_id','desc')->paginate(5);
        return view('admin.thucdon.mon-an', compact('monAn'));
    }

    public function addFood(Request $request)
    {
        $idShool = Auth::guard('nhatruong')->id();
        $monAn = DB::table('monan')->insert([
            'ma_ten' => $request->tenMon,
            'nt_id' => $idShool
        ]);
        return redirect()->back();
    }
}
