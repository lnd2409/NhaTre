@extends('admin.template.master')
@push('css-thoi-khoa-bieu')
    <link rel="stylesheet" href="{{ asset('thoi-khoa-bieu') }}/assets/css/style.less">
@endpush
@section('title')
    Lịch hoạt động
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
                                    <li><span class="bread-blod">Lịch hoạt động</span>
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
        <div class="row" >
            <div class="col-md-12" style="margin-bottom: 20px;">
                <h2>Lịch hoạt động</h2>
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

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @php
                        if(count($getAct) >= 1){
                            $day = new Carbon\Carbon($getAct[0]->lhd_ngayapdung);
                            $endDay = $day->addDays(4);
                        }
                    @endphp
                    <h4>Từ ngày <span style="color: blue;">@if(count($getAct) >= 1) {{ $getAct[0]->lhd_ngayapdung }} @endif</span> đến <span style="color: blue;"> @if(count($getAct) >= 1) {{ Carbon\Carbon::parse($endDay)->format('d-m-Y') }} @endif</span></h4>
                <div class="row">
                    @for ($i = 2; $i <= 6; $i++)
                        <div class="col-md-2 text-center" style="font-weight: bold;" >
                            THỨ {{ $i }}
                        </div>
                    @endfor
                    <div class="col-md-12 text-center" style="font-weight: bold;" >
                        {{-- {{ $item->lhd_ngayapdung }} --}}
                    </div>
                    @foreach ($getAct as $item)
                        <div class="col-md-2 text-center" style="font-weight: bold;" >
                            {{ $item->lhd_ngayapdung }}
                        </div>
                    @endforeach
                </div>
                @if(count($getAct) >= 1)
                    <div class="row">
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getAct[0]->lhd_id] as $item)
                                    <li class="list-group-item">{{ $item->mh_tenmon }}</li>
                                    <li class="list-group-item">
                                        <a href="#" class="btn btn-sm btn-default">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getAct[1]->lhd_id] as $item)
                                    <li class="list-group-item">{{ $item->mh_tenmon }}</li>
                                    <li class="list-group-item">
                                        <a href="#" class="btn btn-sm btn-default">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getAct[2]->lhd_id] as $item)
                                    <li class="list-group-item">{{ $item->mh_tenmon }}</li>
                                    <li class="list-group-item">
                                        <a href="#" class="btn btn-sm btn-default">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getAct[3]->lhd_id] as $item)
                                    <li class="list-group-item">{{ $item->mh_tenmon }}</li>
                                    <li class="list-group-item">
                                        <a href="#" class="btn btn-sm btn-default">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getAct[4]->lhd_id] as $item)
                                    <li class="list-group-item">{{ $item->mh_tenmon }}</li>
                                    <li class="list-group-item">
                                        <a href="#" class="btn btn-sm btn-default">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center" style="color: red;">Chưa sắp lịch tuần này</h5>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
