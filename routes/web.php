<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Trang giới thiệu
Route::get('/', function() {
    return view('client.index');
});

//Trang quản trị
Route::get('/admin', function () {
    return view('admin.index');
});

//Trang dành cho phụ huynh

//Trang dành cho giáo viện quản lý

//Trang đăng nhập và phân quyền
Route::get('/login', function () {
    return view('login');
});
