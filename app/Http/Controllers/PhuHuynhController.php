<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PhuHuynhController extends Controller
{
    public function phuHuynh()
    {
        $id = Auth::guard('nhatruong')->id();
        $danhSachPhuHuynh = DB::table('phuhuynh')->where('nt_id',$id)->get();
        // dd($danhSachPhuHuynh);
        return view('admin.phuhuynh.index', compact('danhSachPhuHuynh'));
    }
}
