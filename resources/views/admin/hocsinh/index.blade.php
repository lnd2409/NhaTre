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
                        <h2 class="text-center">Danh sách học sinh</h2>
                    </div>
                    <div class="asset-inner">
                        {{-- <table>
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
                        </table> --}}
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Nơi sinh</th>
                                    <th>Ngày sinh</th>
                                    <th>Lớp</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
