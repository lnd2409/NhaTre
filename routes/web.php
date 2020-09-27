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
Route::group(['middleware' => ['checkNhaTruong']], function () {
    Route::get('/thong-tin-nha-truong','NhaTruongController@nhapThongTin')->name('nhap-thong-tin');
    Route::post('/xu-ly-thong-tin', 'NhaTruongController@xuLyThongTin')->name('xu-ly-thong-tin');

    //Login Success
    Route::group(['middleware' => ['checkThongTin']], function () {
        Route::get('/admin', 'AdminController@index')->name('admin');

        //Giao vien
        Route::group(['prefix' => 'giao-vien'], function () {
            Route::get('/danh-sach-giao-vien','GiaoVienController@index')->name('danh-sach-giao-vien');
            Route::get('/them-giao-vien', 'GiaoVienController@themGiaoVien')->name('them-giao-vien');
            Route::post('/xu-ly-them-giao-vien', 'GiaoVienController@xuLyThemGiaoVien')->name('xu-ly-themm-giao-vien');
            Route::get('/chi-tiet/{id}','GiaoVienController@chiTietGiaoVien')->name('chi-tiet-giao-vien');
            Route::post('/chinh-sua','GiaoVienController@xuLySuaGiaoVien')->name('xu-ly-sua-giao-vien');
        });
        Route::group(['prefix' => 'lop-hoc'], function () {
            Route::get('{idKhoi}','LopHocController@index')->name('danh-sach-lop-hoc');
            Route::get('/chi-tiet/lop-hoc', function () {
                return view('admin.lophoc.chi-tiet');
            })->name('chi-tiet-lop-hoc');
        });
    });

    Route::get('/dang-xuat', 'NhaTruongController@logout')->name('dang-xuat');
});


//Trang dành cho phụ huynh

//Trang dành cho giáo viện quản lý

//Trang đăng nhập và phân quyền
Route::get('/dang-nhap', function () {
    if (Auth::guard('nhatruong')->check()) {
        # code...
        return redirect()->route('admin');;
    }
    return view('login');
})->name('dang-nhap');

Route::get('/dang-ky', function() {
    return view('register');
})->name('dang-ky');

Route::post('/xu-ly-dang-ky', 'NhaTruongController@register')->name('xu-ly-dang-ky');
Route::post('/xu-ly-dang-nhap', 'NhaTruongController@login')->name('xu-ly-dang-nhap');
