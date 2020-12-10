@extends('phu-huynh.template.master')
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
    @include('phu-huynh.template.header')
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
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">

                        <ul class="mailbox-list">
                            <li>
                                <a href="#" class="btn btn-primary btn-sm" style="color: white;">Viết thư  <i class="fa fa-plus"></i></a>
                            </li>
                            <hr>
                            <li class="@if (Request::path() == "phu-huynh/gop-y/thu-den")
                                        active
                                    @endif

                                ">
                                <a href="{{ route('phu-huynh.hop-thu-den') }}">
                                    <span class="pull-right"></span>
                                    <i class="fa fa-envelope"></i> Thư đến
                                </a>
                            </li>

                            <li class="
                                    @if (Request::path() == "/phu-huynh/gop-y/thu-den")
                                        active
                                    @endif
                                ">
                                <a href="#"><i class="fa fa-paper-plane"></i> Đã gửi</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-trash"></i> Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
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
                                <h3 class="font-extra-bold">Tiêu đề:  {{ $thongBao->tb_tieude }}</h3>
                            </div>
                            <div>
                                <span class="font-extra-bold">Từ: </span>
                                <a href="#">{{ $thongBao->gv_ten }}</a>
                            </div>
                            <div>
                                <span class="font-extra-bold">Đến: </span>
                                @foreach ($nguoiNhan as $item)
                                    <a href="#">{{ $item->ph_hoten }}</a> ,
                                @endforeach
                            </div>
                            <div>
                                <span class="font-extra-bold">Ngày: </span> {{ Carbon\Carbon::parse($thongBao->tb_ngayviet)->format('d/m/Y') }}
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
{{--
                    <div class="btn-group active-hook">
                        <button class="btn btn-default" id="phan-hoi"><i class="fa fa-reply"></i> Phản hồi</button>
                        <button class="btn btn-default" id="tro-ve" style="display: none;"><i class="fa fa-reply"></i> Trở về</button>
                    </div>
                    <div class="border-bottom border-left border-right bg-white mg-tb-15">
                    </div> --}}
                    {{-- <div class="panel-footer ft-pn" style="background-color: white;">
                        <div class="chat-message">
                            @foreach ($phanHoi as $item)
                            <div class="message" style="border: 1px solid white; margin-bottom: 5px; padding-left: 10px;padding-top: 10px; border-radius: 30px; background: #F6F8FA;">
                                <a class="message-author" href="#"> @if ($item->ph_hoten)
                                    {{ $item->ph_hoten }}
                                @endif
                                @if ($item->nt_tentruong)
                                    {{ $item->nt_tentruong }}
                                @endif
                                @if ($item->gv_ten)
                                    {{ $item->gv_ten }}
                                @endif </a>
                                <span class="message-date"> {{ Carbon\Carbon::parse($item->tb_ngayviet)->format('d/m/Y') }} </span>
                                <span class="message-content">{{ $item->tb_noidung }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div> --}}
                    <hr>
                    <div class="panel-body panel-csm" id="form-phan-hoi" style="display: none;">
                        <form action="{{ route('phu-huynh.phan-hoi', ['idThu'=> $thongBao->tb_id]) }}" method="post">
                            @csrf
                            <div class="tinymce-single mg-t-30" style="margin-top: 0px; padding-top: 0px;">
                                <textarea name="noiDungThongBao" class="form-control" style="height: 120px;"></textarea>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('phu-huynh.phan-hoi')
    <script>
        $(document).ready(function () {
            $('#phan-hoi').click(function (e) {
                e.preventDefault();
                $('.panel-footer').hide();
                $('#form-phan-hoi').show();
                $('#phan-hoi').hide();
                $('#tro-ve').show();
            });
            $('#tro-ve').click(function (e) {
                e.preventDefault();
                $('.panel-footer').show();
                $('#form-phan-hoi').hide();
                $('#tro-ve').hide();
                $('#phan-hoi').show();
            });
        });
    </script>
@endpush


@endsection
