<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoBeNgoanController extends Controller
{
    public function index()
    {
        $soBeNgoan = DB::table('sobengoan')->where('hs_id',$idStudent)->where('sbn_ngayviet',Carbon::now()->month)->first();
        $hocSinh = DB::table('hocsinh')->where('hs_id',$idStudent)->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->first();
        return view('giao-vien.quan-ly-hoc-sinh.so-be-ngoan', compact('hocSinh','soBeNgoan'));
    }
}
