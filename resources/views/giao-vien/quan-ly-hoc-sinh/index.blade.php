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
    @include('admin.template.header')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Danh sách học sinh</span>
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
            <div class="col-md-12">
                <h2>Quản lý học sinh</h2>
            </div>
            <div class="col-md-12">
                @if (Session::has('alert'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Thành công! </strong> Hoàn tất cập nhật thông tin.
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($hocSinh as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px;">
                <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                    <div class="panel-body custom-panel-jw">
                        <img alt="logo" class="img-circle m-b" src="{{ asset('template') }}/img/contact/1.jpg">
                        <h3><a href="">{{ $item->hs_hoten }}</a></h3>
                        <p><b>Nơi sinh:</b> {{ $item->hs_noisinh }}</p>
                        <p><b>Ngày sinh:</b> {{ $item->hs_ngaysinh }}</p>
                        <p><b>Giới tính:</b> {{ $item->hs_gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
                    </div>
                    <div class="panel-footer contact-footer" style="background-color: unset;">
                        <a href="{{ route('giao-vien.so-be-ngoan', ['idStudent'=> $item->hs_id]) }}" class="btn btn-success">Sổ bé ngoan</a>
                        <a href="#" class="btn btn-info openModal" data-toggle="modal" data-target="#myModal" data-id="{{ $item->hs_id }}">Chỉnh sửa</a>
                        {{-- <a href="#" class="btn btn-danger">Xóa</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
