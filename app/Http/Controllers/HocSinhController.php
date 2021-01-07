<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use Auth;
class HocSinhController extends Controller
{
    public function index()
    {
        $idSchool = Auth::guard('nhatruong')->id();
        if(request()->ajax())
        {
            $data = DB::table('hocsinh')
            ->join('lophoc','lophoc.lh_id','hocsinh.lh_id')
            ->join('hocky_namhoc','hocky_namhoc.hknh_id','lophoc.hknh_id')
            ->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')
            ->where('hocky_namhoc.trangthai',1)
            ->where('lophoc.nt_id',$idSchool)->get();
            return datatables()->of($data)
                    ->addColumn('action', function($data){

                        $button = '<button type="button" data-id="'.$data->hs_id.'" class="btn btn-primary openModal" data-toggle="modal" data-target="#exampleModal">Chỉnh sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        // $button .= '<a href="'. 'http://127.0.0.1:8000/hoc-sinh/xoa-hoc-sinh/'.$data->hs_id.'" id="delete-post" data-toggle="tooltip" data-original-title="Xóa" data-id="'.$data->hs_id.'" class="delete btn btn-danger">Xóa</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.hocsinh.index');
    }

    public function getCourse(Request $request)
    {
        $hocKy = $request->hocKy;
        $namHoc = $request->namHoc;
        $hocKyNamHoc = DB::table('hocky_namhoc')->where('hocky',$hocKy)->where('namhoc',$namHoc)->first();
        $idSchool = Auth::guard('nhatruong')->id();
        $data = DB::table('hocsinh')
                ->join('lophoc','lophoc.lh_id','hocsinh.lh_id')
                ->join('hocky_namhoc','hocky_namhoc.hknh_id','lophoc.hknh_id')
                ->join('phuhuynh','phuhuynh.ph_id','hocsinh.ph_id')
                ->where('hocky', $hocKy)
                ->where('namhoc',$namHoc)
                // ->where('hocky_namhoc.trangthai',1)
                ->where('lophoc.nt_id',$idSchool)->paginate(5);
        // dd($data[0]->trangthai);
        if(count($data) > 0)
        {
            if ($data[0]->trangthai == 1) {
                # code...
                return redirect()->route('danh-sach-hoc-sinh');
            }
        }

        return view('admin.hocsinh.hoc-ky-nam-hoc', compact('data', 'hocKy', 'namHoc'));
    }

    public function editStudent($idStudent)
    {
        $hocSinh = DB::table('hocsinh')->where('hs_id',$idStudent)->join('lophoc','lophoc.lh_id','hocsinh.lh_id')->first();
        return response()->json($hocSinh, 200);
    }

    public function handleEdit(Request $request)
    {

        $addStudent = DB::table('hocsinh')->where('hs_id',$request->idHocSinh)->update([
            'hs_hoten' => $request->hoTen,
            'hs_noisinh' => $request->noiSinh,
            'hs_ngaysinh' => $request->ngaySinh,
            'hs_gioitinh' => $request->gioiTinh,
        ]);
        return redirect()->back();
    }


    public function delStudent($idStudent)
    {
        $del = DB::table('hocsinh')->where('hs_id',$idStudent)->delete();
        dd("Xóa thành công");
    }

    public function viewAddStudent(Request $request)
    {
        $idSchool = Auth::guard('nhatruong')->id();
        $phuHuynh = DB::table('phuhuynh')->where('nt_id',$idSchool)->get();
        // $khoiHoc = DB::table('khoihoc')->get();
        $selectKhoiHoc = DB::table('nhatruong_khoihoc')
                        ->join('khoihoc','khoihoc.kh_id','nhatruong_khoihoc.kh_id')
                        ->where('nhatruong_khoihoc.nt_id',$idSchool)
                        ->get();
        return view('admin.hocsinh.add', compact('phuHuynh','selectKhoiHoc'));
    }

    //AJAX get LopHoc
    public function getLopHoc($idKhoiHoc)
    {
        $lopHoc = DB::table('lophoc')->where('kh_id',$idKhoiHoc)->get();
        return response()->json($lopHoc, 200);
    }

    public function addStudent(Request $request)
    {
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien')->getClientOriginalName();
            $request->file('anhDaiDien')->move(public_path('hinh-anh-hoc-sinh/anh-dai-dien/'),$file);
            $addStudent = DB::table('hocsinh')->insert([
                'hs_hoten' => $request->hoTen,
                'hs_noisinh' => $request->noiSinh,
                'hs_ngaysinh' => $request->ngaySinh,
                'hs_gioitinh' => $request->gioiTinh,
                'hs_avata' => $file,
                'lh_id' => $request->lopHoc,
                'ph_id' => $request->phuHuynh,
            ]);
            return redirect()->route('danh-sach-hoc-sinh');
        }else {
            dd('none');
        }
    }

    public function updateAvt(Request $request)
    {
        // $request->idHocSinh;
        if ($request->hasFile('hinhAnh')) {
            $file = $request->file('hinhAnh')->getClientOriginalName();
            $request->file('hinhAnh')->move(public_path('hinh-anh-hoc-sinh/anh-dai-dien/'),$file);
            $update = DB::table('hocsinh')->where('hs_id', $request->idHocSinh)->update(
                [
                    'hs_avata' => $file
                ]
            );
            return redirect()->route('danh-sach-hoc-sinh');
        }
        else{
            dd("error");
        }
    }
}
