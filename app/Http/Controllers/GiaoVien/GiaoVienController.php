<?php

namespace App\Http\Controllers\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiaoVienController extends Controller
{
    public function index()
    {
        return view('giao-vien.index');
    }

    public function logout()
    {
        if (Auth::guard('giaovien')->check()) {
            # code...
            Auth::guard('giaovien')->logout();
            return redirect()->route('login-giao-vien');
        }
    }
}
