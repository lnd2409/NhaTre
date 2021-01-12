<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
class SoBeNgoanController extends Controller
{
    public function index()
    {

        $idPhuHuynh = Auth::guard('phuhuynh')->id();
        $soBeNgoan = DB::table('sobengoan')->join('hocsinh','hocsinh.hs_id','sobengoan.hs_id')->where('ph_id',$idPhuHuynh)->where('sbn_ngayviet',Carbon::now()->month)->first();
        $hocSinh = DB::table('hocsinh')->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->where('hocsinh.ph_id',$idPhuHuynh)->first();
        return view('phu-huynh.so-be-ngoan.index', compact('hocSinh','soBeNgoan'));
    }
}
