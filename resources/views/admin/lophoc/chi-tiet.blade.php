@extends('admin.template.master')
@section('title')
    Chi tiết lớp học
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
                                    <li><span class="bread-blod">Chi tiết lớp học</span>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <div class="col-md-12" style="padding-left: 0px;">
                        <h4 class="text-center">Danh sách học sinh lớp mầm 1</h4>
                    </div>


                    <div class="col-md-12" style="padding-left: 0px;">
                        <p>Giáo viên chủ nhiệm: <b>Lê Ngọc Đức</b></p>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px; padding-left: 0px;">
                        <div class="breadcome-heading">
                            <form role="search" class="sr-input-func">
                                <input type="text" placeholder="Tìm kiếm học sinh theo tên..." class="search-int form-control" style="width: 300px;">
                                <a href="#" style="right: -105px;"><i class="fa fa-search"></i></a>
                            </form>
                        </div>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody>
                            <tr>
                                <th>Số HS</th>
                                <th>Ảnh đại diện</th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Nơi sinh</th>
                                <th>Phụ huynh</th>
                                <th>Thao tác</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset('template') }}/img/product/book-1.jpg" alt=""></td>
                                <td>Lê Minh Tiến</td>
                                <td>24/8/2017</td>
                                <td>An Giang</td>
                                <td><a href="#">Lê Ngọc Đức</a></td>
                                <td>
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
