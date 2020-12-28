<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TrangChuController extends Controller
{
    public function getSchool()
    {
        $truongHoc = DB::table('nhatruong')->get();
        return view('client.school', compact('truongHoc'));
    }
}
