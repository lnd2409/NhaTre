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
}
