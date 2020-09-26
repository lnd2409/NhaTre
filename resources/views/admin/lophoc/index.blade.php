@extends('admin.template.master')
@section('title')
    lớp học
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
                                    <li><span class="bread-blod">Danh sách lớp học</span>
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
                <div class="sparkline8-list">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd text-center">
                            <h1>Danh sách lớp {{ $tenKhoi->kh_tenkhoi }}</h1>
                        </div>
                    </div>
                    <div class="sparkline8-graph">
                        <div class="static-table-list">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã lớp</th>
                                        <th>Tên lớp</th>
                                        <th>Giáo viên quản lý</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dsLop as $item)
                                    <tr>
                                        <td>{{ $item->lh_id }}</td>
                                        <td>{{ $item->lh_tenlop }}</td>
                                        <td>

                                            @if ($item->gv_id == NULL)
                                                <a href="#">Chọn giáo viên</a>
                                            @else
                                            {{-- <a href="{{ route('chi-tiet-giao-vien', ['id'=>$giaoVien[$item->gv_id][0]->gv_id]) }}">{{ $giaoVien[$item->gv_id][0]->gv_ten }}</a> --}}
                                            <a href="#" data-toggle="modal" id="lopHoc" data-lop="{{ $item->lh_tenlop }}" class="openModal" data-target="#modalShow"  data-id="{{ $giaoVien[$item->gv_id][0]->gv_id }}">{{ $giaoVien[$item->gv_id][0]->gv_ten }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success">Sửa</a>
                                            <a href="#" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalShow" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Thông tin giáo viên</h3>
                <h4>Chủ nhiệm: <span id="tenLop"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Họ tên: <span  id="tenGiaoVien"></span></p>
                        <p>Địa chỉ: <span  id="diaChi"></span></p>
                        <p>Ngày sinh: <span  id="diaChi"></span></p>
                        <p>SĐT: <span  id="sdt"></span></p>
                    </div>
                    <div class="col-md-6">
                        <img alt="logo"  width="60%" src="{{ asset('template') }}/img/contact/1.jpg">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>

@endsection
