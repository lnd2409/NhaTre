<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongBaoController extends Controller
{
    public function viewNotifi()
    {
        return view('giao-vien.thong-bao.index');
    }
}
