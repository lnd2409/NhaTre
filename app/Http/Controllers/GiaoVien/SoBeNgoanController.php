<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
class SoBeNgoanController extends Controller
{
    // public function soBeNgoan($idStudent)
    // {
    //     $soBeNgoan = DB::table('sobengoan')->join('hocsinh','hocsinh.hs_id','sobengoan.hs_id')->get();

    // }

    public function soBeNgoan($idStudent)
    {
        $soBeNgoan = DB::table('sobengoan')->where('hs_id',$idStudent)->where('sbn_ngayviet',Carbon::now()->month)->first();
        $hocSinh = DB::table('hocsinh')->where('hs_id',$idStudent)->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')->first();
        return view('giao-vien.quan-ly-hoc-sinh.so-be-ngoan', compact('hocSinh','soBeNgoan'));
    }

    public function writeNote(Request $request, $idStudent)
    {
        // $getThang = DB::table('sobengoan')->get();
        $checkNull = DB::table('sobengoan')->where('sbn_ngayviet',$request->thang)->get();
        // dd(count($checkNull));
        if (count($checkNull) == 0) {
            # code...
            $chieuCao = $request->chieuCao * 1/100;
            $canNang = $request->canNang;
            $bmi = $canNang/($chieuCao*$chieuCao);
            if ($bmi >= 40) {
                # code...
                $sucKhoe="Béo phì độ 3";
            }
            else if ($bmi <= 39.9 && $bmi >= 35) {
                # code...
                $sucKhoe="Béo phì độ 2";
            }else if ($bmi <= 34.9 && $bmi >= 30) {
                # code...
                $sucKhoe="Béo phì độ 1";
            }else if ($bmi <= 29.9 && $bmi >= 25) {
                # code...
                $sucKhoe="Tiền béo phì";
            }else if ($bmi >= 25) {
                # code...
                $sucKhoe = "Thừa cân";
            }else if ($bmi <= 24.9 && $bmi >= 18.5) {
                # code...
                $sucKhoe="Bình thường";
            }else if ($bmi < 18.5) {
                # code...
                $sucKhoe="Cân nặng thấp (gầy)";
            }
            $note = DB::table('sobengoan')->insert(
                [
                    'sbn_ngayviet' => $request->thang,
                    'sbn_nhanxetchung' => $request->nhanXetChung,
                    'sbn_suckhoe' => $sucKhoe,
                    'sbn_hoctap' => $request->hocTap,
                    'sbn_cannang' => $request->canNang,
                    'sbn_chieucao' => $request->chieuCao,
                    'hs_id' => $idStudent,
                    'created_at' => Carbon::now()
                ]
            );
            return redirect()->back();
        }
        else
        {
            dd("Tồn tại dữ liệu !");
        }
    }

    public function getDataNote($idStudent,$month)
    {
        $soBeNgoan = DB::table('sobengoan')->where('hs_id',$idStudent)->where('sbn_ngayviet', $month)->first();
        if ($soBeNgoan) {
            # code...
            return response()->json($soBeNgoan, 200);
        }
        else{
            return response()->json(
                [
                    "content" => null
                ]
                ,200);
        }
    }
}
