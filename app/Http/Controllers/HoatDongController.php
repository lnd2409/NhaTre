<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
class HoatDongController extends Controller
{
    public function getHoatDong()
    {

    }

    public function makeActivate(Request $request ,$idClass)
    {
        #lấy id nhà trường
        $idSchool = Auth::guard('nhatruong')->id();
        // $dayNowInWeek = Carbon::now()->dayOfWeek;
        $dateCheckWeek = new Carbon($request->get('ngayApDung'));
        // dd($dateTest->dayOfWeek);
        #nhận giá trị đầu vào là ngày áp dụng
        // echo $dateCheckWeek->dayOfWeek;
        if($dateCheckWeek->dayOfWeek != 1)
        {
            dd('Không phải ngày đầu tuần');
        }
        $ngayApDung = $request->get('ngayApDung');
        #lấy tất cả lớp học trong khối đã chọn
        $lopHoc = DB::table('lophoc')->where('kh_id', $idClass)->where('nt_id',$idSchool)->get();
        #lấy danh sách môn học đưa vào mảng
        $monHoc = DB::table('monhoc')->get('mh_id')->toArray();

        foreach ($lopHoc as $key => $item1) {
            #tạo lịch hoạt động trong 7 ngày
            for ($i=0; $i < 5; $i++) {
                # code...
                $date = $ngayApDung;
                $date1 = str_replace('-', '/', $date);
                $tomorrow = date('d-m-Y',strtotime($date1 . "+5 days"));
                $setTomorow = date('d-m-Y',strtotime($date1 . "+".$i." days"));
                if($tomorrow == $setTomorow){
                    $i = 0;
                }
                #in ra ngày để kiểm tra thử
                // echo $setTomorow.'<br>';
                $makeAct = DB::table('lichhoatdong')->insertGetId(
                    [
                        'lhd_ngayapdung' => $setTomorow,
                        'lh_id' => $item1->lh_id,
                        'created_at' => Carbon::now(),
                    ]
                );
                #một ngày có 9 tiết
                for ($j=0; $j < 9; $j++) {
                    # code...
                    #ngẫu nhiên môn học
                    $rand = array_random($monHoc);
                    $makeDetailAct = DB::table('chitietlichhoatdong')->insert(
                        [
                            'lhd_id' => $makeAct,
                            'mh_id' => $rand->mh_id,
                            'created_at' => Carbon::now()
                        ]
                    );
                }
            }
        }
        return redirect()->back();
    }

    public function getActivate($idClass){
        $lichHoatDong = DB::table('chitietlichhoatdong')
                        ->join('lichhoatdong','lichhoatdong.lhd_id','chitietlichhoatdong.lhd_id')
                        ->join('monhoc','monhoc.mh_id','chitietlichhoatdong.mh_id')
                        ->where('lh_id',$idClass)->get('mh_tenmon','lichhoatdong.lhd_id');
        dd($lichHoatDong);
    }
}
