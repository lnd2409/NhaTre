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
        Route::get('/admin', 'NhaTruongController@index')->name('admin');

        //Giao vien
        Route::group(['prefix' => 'giao-vien'], function () {
            Route::get('/danh-sach-giao-vien','GiaoVienController@index')->name('danh-sach-giao-vien');
            Route::get('/them-giao-vien', 'GiaoVienController@themGiaoVien')->name('them-giao-vien');
            Route::post('/xu-ly-them-giao-vien', 'GiaoVienController@xuLyThemGiaoVien')->name('xu-ly-themm-giao-vien');
            Route::get('/chi-tiet/{id}','GiaoVienController@chiTietGiaoVien')->name('chi-tiet-giao-vien');
            Route::post('/chinh-sua','GiaoVienController@xuLySuaGiaoVien')->name('xu-ly-sua-giao-vien');
            Route::get('/reset-password/{id}', 'GiaoVienController@resetPassword')->name('reset-password-giao-vien');
        });

        #Lớp học
        Route::group(['prefix' => 'lop-hoc'], function () {
            Route::get('{idKhoi}','LopHocController@index')->name('danh-sach-lop-hoc');
            Route::get('/chi-tiet/{idLop}', 'LopHocController@studentInClass')->name('chi-tiet-lop-hoc');

            //AJAX lấy lớp học
            Route::get('/get/{idKhoiHoc}', 'HocSinhController@getLopHoc')->name('lophoc.select-lop-hoc');

        });

        #Học sinh
        Route::group(['prefix' => 'hoc-sinh'], function () {
            Route::get('danh-sach', 'HocSinhController@index')->name('danh-sach-hoc-sinh');
            Route::get('data','HocSinhController@getData')->name('hocsinh.get-data');
            Route::get('chi-tiet/{idStudent}', 'HocSinhController@editStudent')->name('chinh-sua-thong-tin-hoc-sinh');
            Route::get('xoa-hoc-sinh/{idStudent}','HocSinhController@delStudent')->name('xoa-hoc-sinh');
            Route::get('them-hoc-sinh', 'HocSinhController@viewAddStudent')->name('hocsinh.them-hoc-sinh');
            Route::post('xu-ly-them-hoc-sinh', 'HocSinhController@addStudent')->name('hocsinh.xu-ly-them');
        });

        #Thực đơn
        Route::group(['prefix' => 'thuc-don'], function () {
            Route::get('mon-an','MonAnController@viewFood')->name('mon-an');
            Route::post('them-mon-an', 'MonAnController@addFood')->name('them-mon-an');
            Route::get('thuc-don', 'ThucDonController@viewThucDon')->name('thuc-don');
            Route::post('them-thuc-don', 'ThucDonController@addThucDon')->name('them-thuc-don');
        });

        #Phụ huynh
        Route::group(['prefix' => 'phu-huynh'], function () {
            Route::get('danh-sach', 'PhuHuynhController@phuHuynh')->name('danh-sach-phu-huynh');
        });
    });

    Route::get('/dang-xuat', 'NhaTruongController@logout')->name('dang-xuat');
});


//Trang dành cho phụ huynh

//Trang dành cho giáo viện quản lý

//Trang đăng nhập và phân quyền
#Nhà trường
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

#Giáo viên
Route::group(['prefix' => 'giao-vien'], function () {
    Route::get('/dang-nhap', function () {
        if(Auth::guard('giaovien')->check()) {
            return redirect()->route('giao-vien.trang-quan-ly');
        }
        return view('giao-vien.login');
    })->name('login-giao-vien');
    Route::post('/xu-ly-dang-nhap', 'GiaoVienController@loginGiaoVien')->name('giao-vien.xu-ky-dang-nhap');
    Route::group(['middleware' => ['checkGiaoVien']], function () {
        Route::get('trang-quan-ly', 'GiaoVien\GiaoVienController@index')->name('giao-vien.trang-quan-ly');
    });
});
