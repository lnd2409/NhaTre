<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Stevebauman\Location\Facades\Location;


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
        $danhGia = DB::table('danhgia')->where('danhgia.nt_id',$idSchool)->join('phuhuynh','phuhuynh.ph_id','danhgia.ph_id')->get();
        $lopHoc = DB::table('lophoc')->where('nt_id',$idSchool)->count();
        $hocSinh = DB::table('hocsinh')->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->where('nt_id',$idSchool)->count();
        $giaoVien = DB::table('giaovien')->where('nt_id',$idSchool)->count();
        return view('client.school-detail', compact('truongHoc','danhGia','lopHoc','hocSinh','giaoVien'));
        // dd($truongHoc);
    }

    public function index(Request $request)
    {

        // $ip = $request->ip();
        // // dd($ip);
        // // $details = GeoLocation::lookup($ip);
        // // dd($details->getIp());
        // if ($position = Location::get($ip)) {
        //     // Successfully retrieved position.
        //     dd($position->countryName);
        // } else {
        //     // Failed retrieving position.
        //     dd('error');
        // }
        /* don't get location */
        $school = DB::table('nhatruong')->orderBy('nt_danhgia','desc')->where('nt_danhgia','>=',4)->paginate(3);
        return view('client.index', compact('school'));
    }
}
