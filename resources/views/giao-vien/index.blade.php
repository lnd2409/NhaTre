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
                                    <li><span class="bread-blod">Trang thống kê</span>
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
            <div class="col-md-12">
                <h2>Thống kê</h2>
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <h2>Giới tính</h2>
                    </div>
                    <div id="pie-chart">
                        <canvas id="piechart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Danh sách học sinh</h4>
                    <div class="add-product">
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Họ tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày vào lớp</th>
                                </tr>
                                @foreach ($hocSinh as $item)
                                <tr>
                                    <td>{{ $item->hs_id }}</td>
                                    <td>{{ $item->hs_hoten }}</td>
                                    <td><img src="img/product/book-1.jpg" alt=""></td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="custom-pagination">
                        <a href="{{ route('giao-vien.danh-sach-hoc-sinh') }}">Xem danh sách lớp</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('giao-vien.chart')
    <!-- Charts JS
    ============================================ -->
    <script src="{{ asset('template') }}/js/charts/Chart.js"></script>
    {{-- <script src="{{ asset('template') }}/js/charts/rounded-chart.js"></script> --}}
    <script>
    (function ($) {
    "use strict";

        /*----------------------------------------*/
        /*  1.  pie Chart
        /*----------------------------------------*/
        var ctx = document.getElementById("piechart");
        var piechart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Nam", "Nữ"],
                datasets: [{
                    label: 'pie Chart',
                    backgroundColor: [
                        '#b3d4fc',
                        '#f22626'
                    ],
                    data: [{{ $hocSinhNam }},{{ $hocSinhNu }}]
                }]
            },
            options: {
                responsive: true
            }
        });
    })(jQuery);
    </script>
@endpush
@endsection
