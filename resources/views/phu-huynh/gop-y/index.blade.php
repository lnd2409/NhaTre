@extends('phu-huynh.template.master')
@section('title')
    Hộp thư
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
                                    <li><a href="{{ route('phu-huynh.trang-chu') }}">Trang chủ</a> <span class="bread-slash">/</span>
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
                <h2>Hộp thư góp ý</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">

                        <ul class="mailbox-list">
                            <li>
                                <a href="#" class="btn btn-primary btn-sm" style="color: white;">Soạn thư  <i class="fa fa-plus"></i></a>
                            </li>
                            <hr>
                            <li class="@if (Request::path() == "phu-huynh/gop-y/thu-den")
                                        active
                                    @endif

                                ">
                                <a href="{{ route('phu-huynh.hop-thu-den') }}">
                                    <span class="pull-right"></span>
                                    <i class="fa fa-envelope"></i> Thư đến @if ($demBaiViet)
                                        ({{ $demBaiViet }})
                                    @endif
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
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive ib-tb">
                            <table class="table table-hover table-mailbox">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th>Người gửi</th>
                                        <th>Tiêu đề</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    @foreach ($baiViet as $item)
                                        <tr class="
                                            @if ($item->nn_trangthai == 0)
                                                unread
                                            @else
                                                read
                                            @endif
                                        ">
                                            <td >
                                                <div class="checkbox checkbox-single checkbox-success">
                                                    <input type="checkbox" checked="">
                                                    <label></label>
                                                </div>
                                            </td>
                                            <td><a href="#">{{ $item->gv_ten }}</a></td>
                                            <td><a href="{{ route('phu-huynh.chi-tiet-thong-bao', ['idThu'=>$item->tb_id]) }}">{{ $item->tb_tieude }}</a>
                                            </td>
                                            <td class="text-center mail-date">{{ Carbon\Carbon::parse($item->tb_ngayviet)->format('d/m/Y') }}</td>
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
@endsection
