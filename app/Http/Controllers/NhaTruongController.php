<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhatruong;
use Hash;
use Session;
use Auth;
use DB;
class NhaTruongController extends Controller
{


    public function register(Request $request)
    {
        $nhaTruong = new Nhatruong();
        $nhaTruong->nt_tentruong = $request->tenTruong;
        $nhaTruong->nt_diachi = $request->diaChi;
        $nhaTruong->nt_sodienthoai = $request->sdt;
        $nhaTruong->nt_email = $request->email;
        $nhaTruong->username = $request->username;
        $nhaTruong->password = Hash::make($request->password);
        $nhaTruongFirst = Nhatruong::where('username',$request->username)->count();
        if ($nhaTruongFirst == 1) {
            # code...
            Session::flash('alert','Tài khoản đã tồn tại');
            return redirect()->back();
        }else{
            $nhaTruong->save();
            Session::flash('alert','Tạo tài khoản thành công');
            return redirect()->route('admin');
        }
    }

    public function login(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::guard('nhatruong')->attempt($arr)) {
            return redirect()->route('admin');
        } else {
            dd('tài khoản và mật khẩu chưa chính xác');
        }
    }

    public function logout()
    {
        if(Auth::guard('nhatruong')->check()){
            Auth::guard('nhatruong')->logout();
        }
        return redirect()->route('dang-nhap');
    }

    public function nhapThongTin(Request $request)
    {
        $id = Auth::guard('nhatruong')->id();
        $nhaTruong = Nhatruong::where('nt_id',$id)->first();
        $khoiHoc = DB::table('khoihoc')->get();
        return view('tao-thong-tin.index', compact('khoiHoc','nhaTruong'));
    }

    public function xuLyThongTin(Request $request)
    {
        $id = Auth::guard('nhatruong')->id();
        //Học kỳ - Năm học
        $namHoc = $request->namHoc;
        $hocKy = $request->hocKy;
        $insertNamHocHocKy = DB::table('hocky_namhoc')->insertGetId([
            'hocky' => $hocKy,
            'namhoc' => $namHoc
        ]);

        //Thêm khối học - trường
        if($request->lopMam){
            $addThongTinLopMam = DB::table('nhatruong_khoihoc')->insert([
                'nt_id' => $id,
                'kh_id' => 1
            ]);
            for ($i=1; $i <= $request->lopMam; $i++) {
                # code...
                $addThongTin = DB::table('lophoc')->insert([
                    'lh_tenlop' => 'Lớp mầm '.$i,
                    'nt_id' => $id,
                    'kh_id' => 1,
                    'hknh_id' => $insertNamHocHocKy
                ]);
            }
            if($request->lopChoi){
                $addThongTinLopChoi = DB::table('nhatruong_khoihoc')->insert([
                    'nt_id' => $id,
                    'kh_id' => 2
                ]);
                for ($i=1; $i <= $request->lopChoi; $i++) {
                    # code...
                    $addThongTin = DB::table('lophoc')->insert([
                        'lh_tenlop' => 'Lớp chồi '.$i,
                        'nt_id' => $id,
                        'kh_id' => 2,
                        'hknh_id' => $insertNamHocHocKy
                    ]);
                }
                if($request->lopLa){
                    $addThongTinLopLa = DB::table('nhatruong_khoihoc')->insert([
                        'nt_id' => $id,
                        'kh_id' => 3
                    ]);
                    for ($i=1; $i <= $request->lopLa; $i++) {
                        # code...
                        $addThongTin = DB::table('lophoc')->insert([
                            'lh_tenlop' => 'Lớp lá '.$i,
                            'nt_id' => $id,
                            'kh_id' => 3,
                            'hknh_id' => $insertNamHocHocKy
                        ]);
                    }
                }
            }
        }

        //Tạo phòng học
        $tongLop = $request->lopMam + $request->lopChoi + $request->lopLa;
        for ($i=1; $i <= $tongLop; $i++) {
            # code...
        }
        return redirect()->route('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
