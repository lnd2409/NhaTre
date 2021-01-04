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

    public function shoolDetail($idSchool)
    {
        $truongHoc = DB::table('nhatruong')->where('nt_id',$idSchool)->first();
        return view('client.school-detail', compact('truongHoc'));
        // dd($truongHoc);
    }

    // public function anTet()
    // {
    //     $codeError;
    //     if($codeError)
    //     {
    //         return "Không được ăn tết !";
    //     }
    // }
}
