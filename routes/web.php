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
})->name('trang-chu');
Route::get('/truong-hoc', 'TrangChu\TrangChuController@getSchool')->name('trang-chu.truong-hoc');
Route::get('/truong-hoc/{idSchool}/chi-tiet', 'TrangChu\TrangChuController@shoolDetail')->name('trang-chu.chi-tiet-truong-hoc');



//Trang quản trị nhà trường
Route::group(['middleware' => ['checkNhaTruong']], function () {
    Route::get('/thong-tin-nha-truong','NhaTruongController@nhapThongTin')->name('nhap-thong-tin');
    Route::post('/xu-ly-thong-tin', 'NhaTruongController@xuLyThongTin')->name('xu-ly-thong-tin');

    //Login Success
    Route::group(['middleware' => ['checkThongTin']], function () {
        Route::get('/admin', 'NhaTruongController@index')->name('admin');

        #thông tin trường
        Route::get('/thong-tin', 'NhaTruongController@getInfo')->name('nha-truong.thong-tin');
        Route::post('/them-gioi-thieu-chung', 'NhaTruongController@gioiThieuChungHandle')->name('nha-truong.them-gioi-thieu-chung');
        Route::post('/them-gioi-thieu-ban-giam-hieu', 'NhaTruongController@gioiThieuBanGiamHieuHandle')->name('nha-truong.them-gioi-thieu-ban-giam-hieu');
        Route::post('/them-gioi-thieu-giao-vien', 'NhaTruongController@gioiThieuGiaoVienHandle')->name('nha-truong.them-gioi-thieu-giao-vien');
        Route::post('/them-gioi-thieu-co-so-vat-chat', 'NhaTruongController@gioiThieuCoSoVatChatHandle')->name('nha-truong.them-gioi-thieu-co-so-vat-chat');

        //Giao vien
        Route::group(['prefix' => 'quan-ly-giao-vien'], function () {
            Route::get('/danh-sach-giao-vien','GiaoVienController@index')->name('danh-sach-giao-vien');
            Route::get('/them-giao-vien', 'GiaoVienController@themGiaoVien')->name('them-giao-vien');
            Route::post('/xu-ly-them-giao-vien', 'GiaoVienController@xuLyThemGiaoVien')->name('xu-ly-themm-giao-vien');
            Route::get('/chi-tiet/{id}','GiaoVienController@chiTietGiaoVien')->name('chi-tiet-giao-vien');
            Route::post('/chinh-sua','GiaoVienController@xuLySuaGiaoVien')->name('xu-ly-sua-giao-vien');
            Route::post('/cap-nhat-anh-dai-dien', 'GiaoVienController@capNhatAnhDaiDien')->name('cap-nhat-avata-giao-vien');
            Route::get('/reset-password/{id}', 'GiaoVienController@resetPassword')->name('reset-password-giao-vien');
        });

        #Lớp học
        Route::group(['prefix' => 'lop-hoc'], function () {
            Route::get('{idKhoi}','LopHocController@index')->name('danh-sach-lop-hoc');
            Route::get('/chi-tiet/{idLop}', 'LopHocController@studentInClass')->name('chi-tiet-lop-hoc');

            //AJAX lấy lớp học
            Route::get('/get/{idKhoiHoc}', 'HocSinhController@getLopHoc')->name('lophoc.select-lop-hoc');

            //Thêm giáo viên quản lý
            Route::post('/them-giao-vien-quan-ly', 'LopHocController@addTecherInClass')->name('lophoc.them-giao-vien-quan-ly');

        });

        #Học sinh
        Route::group(['prefix' => 'hoc-sinh'], function () {
            Route::get('danh-sach', 'HocSinhController@index')->name('danh-sach-hoc-sinh');
            Route::get('data','HocSinhController@getData')->name('hocsinh.get-data');
            Route::get('chinh-sua/{idStudent}', 'HocSinhController@editStudent')->name('chinh-sua-thong-tin-hoc-sinh');
            Route::get('xoa-hoc-sinh/{idStudent}','HocSinhController@delStudent')->name('xoa-hoc-sinh');
            Route::get('them-hoc-sinh', 'HocSinhController@viewAddStudent')->name('hocsinh.them-hoc-sinh');
            Route::post('xu-ly-them-hoc-sinh', 'HocSinhController@addStudent')->name('hocsinh.xu-ly-them');
            Route::post('cap-nhat', 'HocSinhController@handleEdit')->name('hoc-sinh.xu-ly-chinh-sua');
            Route::get('hoc-ky-nam-hoc','HocSinhController@getCourse')->name('hoc-sinh.danh-sach-hoc-ky-nam-hoc');
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
            Route::get('them-phu-huynh', 'PhuHuynhController@themPhuHuynh')->name('them-phu-huynh');
            Route::post('xu-ly-them-phu-huynh', 'PhuHuynhController@xuLyThemPhuHuynh')->name('xu-ly-them-phu-huynh');
        });

        #Môn học
        Route::group(['prefix' => 'mon-hoc'], function () {
            Route::get('danh-sach', 'MonHocController@index')->name('danh-sach-mon-hoc');
            Route::post('them-mon-hoc', 'MonHocController@store')->name('them-mon-hoc');
        });

        #Lịch hoạt động
        Route::get('sap-lich-hoat-dong/{idClass}', 'HoatDongController@makeActivate')->name('nha-truong.sap-lich-hoat-dong');
        Route::get('lich-hoat-dong/{idClass}', 'HoatDongController@getActivate')->name('nha-truong.lich-hoat-dong-chi-tiet');



    });

    Route::get('/dang-xuat', 'NhaTruongController@logout')->name('dang-xuat');
});
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

        Route::group(['prefix' => 'hoc-sinh'], function () {
            Route::get('danh-sach','GiaoVien\HocSinhController@getStudentInClass')->name('giao-vien.danh-sach-hoc-sinh');
            Route::get('{idStudent}/so-be-ngoan/', 'GiaoVien\SoBeNgoanController@soBeNgoan')->name('giao-vien.so-be-ngoan');
            Route::get('/{idStudent}/viet-so-be-ngoan', 'GiaoVien\SoBeNgoanController@writeNote')->name('giao-vien.viet-so-be-ngoan');

            //AJAX
            Route::get('/so-be-ngoan/{idStudent}/{month}','GiaoVien\SoBeNgoanController@getDataNote')->name('giao-vien.ajax-get-so-be-ngoan');
        });

        #Thông báo
        Route::group(['prefix' => 'thong-bao'], function () {
            Route::get('/', 'GiaoVien\ThongBaoController@viewNotifi')->name('giao-vien.thong-bao');
            Route::get('/thong-bao-da-gui', 'GiaoVien\ThongBaoController@postSended')->name('giao-vien.thong-bao-da-gui');
            Route::get('/viet-thong-bao','GiaoVien\ThongBaoController@writePost')->name('giao-vien.viet-thong-bao');
            Route::post('/xu-ly-viet-thong-bao', 'GiaoVien\ThongBaoController@postHandle')->name('giao-vien.xu-ly-viet-thong-bao');
            Route::get('/thong-bao/{idPost}', 'GiaoVien\ThongBaoController@postDetail')->name('giao-vien.chi-tiet-thong-bao');
        });

        #Hoạt động
        Route::group(['prefix' => 'hoat-dong'], function () {
            Route::get('/', 'GiaoVien\LichHoatDongController@getHoatDong')->name('hoat-dong.danh-sach');
            Route::get('/chi-tiet/{idActive}', 'GiaoVien\LichHoatDongController@getDetailActive')->name('hoat-dong.chi-tiet');
            Route::post('/them-hinh-anh','GiaoVien\LichHoatDongController@insertImageActive')->name('hoat-dong.them-hinh-anh');
        });

        #Đơn xin phép
        Route::group(['prefix' => 'don-xin-phep'], function () {
            Route::get('/', 'GiaoVien\DonXinPhepController@index')->name('giao-vien.don-xin-phep');
        });

        #Điểm danh
        Route::group(['prefix' => 'diem-danh'], function () {
            Route::get('/', 'GiaoVien\DiemDanhController@index')->name('giao-vien.diem-danh');
            Route::get('/danh-sach', 'GiaoVien\DiemDanhController@viewFillAttendance')->name('giao-vien.giao-dien-diem-danh');
            Route::get('/check/{idStudent}/{trangThai}/{idDiemDanh}', 'GiaoVien\DiemDanhController@fillAttendance')->name('giao-vien.check-diem-danh');
            Route::get('/{idDiemDanh}', 'GiaoVien\DiemDanhController@attendanceDetail')->name('giao-vien.chi-tiet-diem-danh');
        });

        #Đăng xuất
        Route::get('dang-xuat-giao-vien', 'GiaoVien\GiaoVienController@logout')->name('giao-vien.dang-xuat');
    });
});

#Trang dành cho phụ huynh
Route::group(['prefix' => 'phu-huynh'], function () {
    Route::get('dang-nhap', function () {
        return view('phu-huynh.login');
    })->name('login-phu-huynh');
    Route::post('xu-ly-dang-nhap', 'PhuHuynh\AuthController@handleLogin')->name('phu-huynh.xu-ly-dang-nhap');

    Route::group(['middleware' => ['checkPhuHuynh']], function () {
        Route::get('/', function () {
            return view('phu-huynh.index');
        })->name('phu-huynh.trang-chu');
        Route::get('/dang-xuat', 'PhuHuynh\AuthController@logout')->name('phu-huynh.dang-xuat');

        #Góp ý
        Route::group(['prefix' => 'gop-y'], function () {
            Route::get('thu-den', 'PhuHuynh\GopYController@hopThuDen')->name('phu-huynh.hop-thu-den');
            Route::get('chi-tiet/{idThu}', 'PhuHuynh\GopYController@docthuDen')->name('phu-huynh.chi-tiet-thong-bao');
            Route::post('phan-hoi/{idThu}', 'PhuHuynh\GopYController@phanHoi')->name('phu-huynh.phan-hoi');
        });

        #Đơn xin phép
        Route::get('don-xin-phep', 'PhuHuynh\DonXinPhepController@index')->name('phu-huynh.don-xin-phep');
        Route::post('xu-ly-don-xin-phep', 'PhuHuynh\DonXinPhepController@xuLyNghiPhep')->name('phu-huynh.xu-ly-don-xin-phep');

        #Lịch hoạt động
        Route::group(['prefix' => 'lich-hoat-dong'], function () {
            Route::get('/', 'PhuHuynh\LichHoatDongController@getActive')->name('phu-huynh.lich-hoat-dong');
            Route::get('/chi-tiet/{idActive}', 'PhuHuynh\LichHoatDongController@getDetailActive')->name('phu-huynh.hoat-dong-chi-tiet');
        });
        Route::get('thuc-don', 'PhuHuynh\ThucDonController@thucDon')->name('phu-huynh.thuc-don');
    });
});

#admin hệ thống
Route::get('quan-tri', function () {
    return view('admin-he-thong.index');
});
