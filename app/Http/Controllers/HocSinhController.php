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
        $idSchool = Auth::guard('nhatruong')->id();;
        if(request()->ajax())
        {
            $data = DB::table('hocsinh')
            ->join('lophoc','lophoc.lh_id','hocsinh.lh_id')
            ->where('nt_id',$idSchool)->get();
            return datatables()->of($data)
                    ->addColumn('action', function($data){

                        $button = '<a href="'. 'http://127.0.0.1:8000/hoc-sinh/chi-tiet/'.$data->hs_id.'" data-toggle="tooltip"  data-id="'.$data->hs_id.'" data-original-title="Chỉnh sửa" class="edit btn btn-success edit-post">Chỉnh sửa</a>';
                        $button .= '&nbsp;&nbsp;';
                        // $button .= '<a href="'. 'http://127.0.0.1:8000/hoc-sinh/xoa-hoc-sinh/'.$data->hs_id.'" id="delete-post" data-toggle="tooltip" data-original-title="Xóa" data-id="'.$data->hs_id.'" class="delete btn btn-danger">Xóa</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.hocsinh.index');
    }

    public function editStudent($idStudent)
    {
        $hocSinh = DB::table('hocsinh')->where('hs_id',$idStudent)->first();
        dd($hocSinh);
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
        $addStudent = DB::table('hocsinh')->insert([
            'hs_hoten' => $request->hoTen,
            'hs_noisinh' => $request->noiSinh,
            'hs_ngaysinh' => $request->ngaySinh,
            'hs_gioitinh' => $request->gioiTinh,
            'lh_id' => $request->lopHoc,
            'ph_id' => $request->phuHuynh,
        ]);
        return redirect()->route('danh-sach-hoc-sinh');
    }
}
