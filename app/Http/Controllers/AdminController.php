<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function index()
    {
        $lopMam = DB::table('lophoc')->where('kh_id',1)->count();
        $lopChoi = DB::table('lophoc')->where('kh_id',2)->count();
        $lopLa = DB::table('lophoc')->where('kh_id',3)->count();
        return view('admin.index', compact('lopMam','lopChoi','lopLa'));
    }
}
