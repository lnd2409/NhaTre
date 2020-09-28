<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
class HocSinhController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(DB::table('hocsinh')->join('lophoc','lophoc.lh_id','hocsinh.lh_id')->get())
                    // ->addColumn('action', function($data){
                    // $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-success edit-post">Edit</a>';
                    // $button .= '&nbsp;&nbsp;';
                    // $button .= '<a href="javascript:void(0);" id="delete-post" data-toggle="tooltip" data-original-title="Delete" data-id="'.$data->id.'" class="delete btn btn-danger">   Delete</a>';
                    // return $button;
                    // })
                    // ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.hocsinh.index');
    }

    // public function getData()
    // {
    //     $data = DB::table('hocsinh')->join('lophoc','lophoc.lh_id','hocsinh.lh_id')->get();
    //     return Datatables::of($data)->make(true);
    // }

}
