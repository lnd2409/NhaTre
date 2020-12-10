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
                                    <li><span class="bread-blod">Thông báo</span>
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
    <div class="container-fluid" style="margin-left: 20px;">
        <div class="row">
            <div class="col-md-12">
                <a onclick="history.back()" class="btn btn-default">Quay lại</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel email-compose mailbox-view">
                    <div class="panel-heading hbuilt">

                        <div class="p-xs h4">
                            <small class="pull-right view-hd-ml">
                                {{ Carbon\Carbon::parse($thongBao->tb_ngayviet)->format('d/m/Y') }}
                                </small> Nội dung

                        </div>
                    </div>
                    <div class="border-top border-left border-right bg-light">
                        <div class="p-m custom-address-mailbox">

                            <div>
                                <span class="font-extra-bold">Tiêu đề: </span> {{ $thongBao->tb_tieude }}
                            </div>
                            <div>
                                <span class="font-extra-bold">Người viết: </span>
                                <a href="#">{{ $thongBao->gv_ten }}</a>
                            </div>
                            <div>
                                <span class="font-extra-bold">Người nhận: </span>
                                @foreach ($nguoiNhan as $item)
                                    <a href="#">{{ $item->ph_hoten }}</a> ,
                                @endforeach
                            </div>
                            <div>
                                <span class="font-extra-bold">Ngày gửi: </span> {{ Carbon\Carbon::parse($thongBao->tb_ngayviet)->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel-body panel-csm">
                        <div>
                            {!! $thongBao->tb_noidung !!}
                        </div>
                    </div>

                    <div class="border-bottom border-left border-right bg-white mg-tb-15">
                    </div>

                    <div class="panel-footer text-right ft-pn">
                        <div class="btn-group active-hook">
                            <button class="btn btn-default"><i class="fa fa-reply"></i> Chỉnh sửa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
