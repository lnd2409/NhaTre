@extends('admin.template.master')
@section('title')
    Giáo viên
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
                <a href="index.html"><img class="main-logo" src="{{ asset('template') }}/img/logo/logo.png" alt="" /></a>
            </div>
        </div>
    </div>
</div>
<div class="header-advance-area">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row">
                            <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                        <i class="educate-icon educate-nav"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12"></div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <img src="{{ asset('template') }}/img/product/pro4.jpg" alt="" />
                                                    <span class="admin-name">{{ Auth::guard('nhatruong')->user()->username }}</span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>Thông tin cá nhân</a></li>
                                                <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Tùy chỉnh tài khoản</a></li>
                                                <li><a href="{{ route('dang-xuat') }}"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="Tìm kiếm..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Danh sách giáo viên</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            @foreach ($danhSachGiaoVien as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                    <div class="panel-body custom-panel-jw">
                        <img alt="logo" class="img-circle m-b" src="{{ asset('template') }}/img/contact/1.jpg">
                        <h3><a href="">{{ $item->gv_ten }}</a></h3>
                        <p class="all-pro-ad">Địa chỉ: {{ $item->gv_diachi }}</p>
                        <p>Số điện thoại: {{ $item->gv_sdt }}</p>
                        <p>Ngày sinh: {{ $item->gv_ngaysinh }}</p>
                        <p>Giới tính: {{ $item->gv_gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
                    </div>
                    <div class="panel-footer contact-footer" style="background-color: unset;">
                        <a href="#" class="btn btn-info openModal" data-toggle="modal" data-target="#myModal" data-id="{{ $item->gv_id }}">Chỉnh sửa</a>
                        <a href="#" class="btn btn-danger">Xóa</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh sửa thông tin giáo viên </h4>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" id="idGiaoVien">
                    <div class="form-group">
                        <label>Tên giáo viên</label>
                        <input type="text" name="hoTen" class="form-control" id="tenGiaoVien">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="diaChi" class="form-control" id="diaChi">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" name="ngaySinh" class="form-control" id="ngaySinh">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="sdt" class="form-control" id="sdt">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <select class="form-control" name="gioiTinh">
                          <option value="1" id="men">Nam</option>
                          <option value="0" id="women">Nữ</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center">Kiểm tra kỹ thông tin trước khi cập nhật</p>
            </div>
        </div>

    </div>
</div>
@endsection

