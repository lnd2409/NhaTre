<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Auth;
class DonXinPhepController extends Controller
{
    public function index()
    {
        $phuHuynh = Auth::guard('phuhuynh')->id();
        $hocSinh = DB::table('hocsinh')->where('ph_id', $phuHuynh)->first();
        $donXinPhep = DB::table('donxinphep')->where('hs_id',$hocSinh->hs_id)->get();
        $ngayNghi = array();
        foreach ($donXinPhep as $value) {
            # code...
            $ngayNghi[$value->dxp_id] = DB::table('chitietdonxinphep')->where('dxp_id',$value->dxp_id)->get();
            // dd($ngayNghi);
        }
        return view('phu-huynh.xin-phep.index', compact('donXinPhep','ngayNghi'));
    }

    public function xuLyNghiPhep(Request $request)
    {
        $phuHuynh = Auth::guard('phuhuynh')->id();
        $hocSinh = DB::table('hocsinh')->where('ph_id', $phuHuynh)->first();
        #nhận vào các giá trị
        $noiDung = $request->lyDo;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;
        #in ra số ngày nghỉ
        $soNgayNghi = date_diff(date_create($ngayKetThuc),date_create($ngayBatDau))->format("%a");
        #in ra kiểm tra thử số ngày nghỉ là mấy ngày
        // echo $soNgayNghi.' ngày';
        #tạo đơn xin nghỉ
        if ($ngayKetThuc != null) {
            # code...
            $donXinPhep = DB::table('donxinphep')->insertGetId(
                [
                    'dxp_noidung' => $noiDung,
                    'dxp_trangthai' => 0,
                    'hs_id' => $hocSinh->hs_id,
                    'created_at' => Carbon::now()
                ]
            );
            for ($i=0; $i <= $soNgayNghi ; $i++) {
                # code...
                $date = $ngayBatDau;
                $dateCount = str_replace('-', '/', $date);
                $setTomorow = date('d-m-Y',strtotime($dateCount . "+".$i." days"));
                // $newformat = date('d-m-Y',$setTomorow);
                $newformat = new Carbon($setTomorow);
                #in thử ngày
                // echo $newformat->format('d-m-Y').'<br>';
                #chi tiết đơn xin nghỉ
                $chiTietDon = DB::table('chitietdonxinphep')->insert(
                    [
                        'dxp_id' => $donXinPhep,
                        'hs_id' => $hocSinh->hs_id,
                        'ctdxp_ngay' => $newformat
                    ]
                );
            }
        }
        else {
            $donXinPhep = DB::table('donxinphep')->insertGetId(
                [
                    'dxp_noidung' => $noiDung,
                    // 'dxp_ngay' => $ngayBatDau,
                    'dxp_trangthai' => 0,
                    'hs_id' => $hocSinh->hs_id
                ]
            );
            $chiTietDon = DB::table('chitietdonxinphep')->insert(
                [
                    'dxp_id' => $donXinPhep,
                    'hs_id' => $hocSinh->hs_id,
                    'ctdxp_ngay' => $ngayBatDau
                ]
            );
        }
        return redirect()->back();
    }
}
