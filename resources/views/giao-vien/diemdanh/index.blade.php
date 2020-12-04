@extends('admin.template.master')
@section('title')
    Điểm danh
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
                                    <li><span class="bread-blod">Đơn xin phép</span>
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
<div class="product-status mg-b-15">
    <div class="container-fluid" style="margin-left: 20px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Điểm danh</h4>
                    <div class="add-product">
                        <a href="{{ route('giao-vien.giao-dien-diem-danh') }}" >Tạo điểm danh ngày {{ Carbon\Carbon::now()->format('d-m-Y') }}</a>
                    </div>
                    <div class="asset-inner">
                        <table >
                            <thead >
                                <tr >
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tiêu đề</th>
                                    <th style="text-align: center;"></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($danhSachDiemDanh as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $stt++ }}</td>
                                        <td style="text-align: center;">Điểm danh ngày {{ Carbon\Carbon::parse($item->dd_ngay)->format('d/m/Y') }}</td>
                                        <td style="text-align: center;">
                                            <a href="#" class="btn btn-default">Xem chi tiết</a>
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
@endsection
