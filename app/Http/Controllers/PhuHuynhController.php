<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PhuHuynhController extends Controller
{
    public function phuHuynh()
    {
        $danhSachPhuHuynh = DB::table('phuhuynh')->get();
        dd($danhSachPhuHuynh);
    }
}
