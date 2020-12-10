<?php

namespace App\Http\Controllers\PhuHuynh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class AuthController extends Controller
{
    public function handleLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::guard('phuhuynh')->attempt($arr)) {
            // dd('logined');
            return redirect()->route('phu-huynh.trang-chu');
        } else {
            dd('tài khoản và mật khẩu chưa chính xác');
        }
    }

    public function logout()
    {
        if (Auth::guard('phuhuynh')->check()) {
            # code...
            Auth::guard('phuhuynh')->logout();
            return redirect()->route('login-phu-huynh');
        }
    }
}
