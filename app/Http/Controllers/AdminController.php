<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AdminController extends Controller
{
    public function index()
    {
        $id = Auth::guard('nhatruong')->id();
        $lopMam = DB::table('lophoc')->where('kh_id',1)->where('nt_id',$id)->count();
        $lopChoi = DB::table('lophoc')->where('kh_id',2)->where('nt_id',$id)->count();
        $lopLa = DB::table('lophoc')->where('kh_id',3)->where('nt_id',$id)->count();
        return view('admin.index', compact('lopMam','lopChoi','lopLa'));
    }
}
