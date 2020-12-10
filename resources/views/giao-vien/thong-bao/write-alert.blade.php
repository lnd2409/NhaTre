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
    <div class="container-fluid"  style="margin-left: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Viết thông báo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">

                        <ul class="mailbox-list">
                            <li>
                                <a href="{{ route('giao-vien.viet-thong-bao') }}" class="btn btn-primary btn-sm" style="color: white;">Viết thư  <i class="fa fa-plus"></i></a>
                            </li>
                            <hr>
                            <li class="
                                    @if (Request::path() == "giao-vien/thong-bao")
                                        active
                                    @endif
                                ">
                                <a href="#">
                                    <span class="pull-right">12</span>
                                    <i class="fa fa-envelope"></i> Thư đến
                                </a>
                            </li>

                            <li>
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
                <form action="{{ route('giao-vien.xu-ly-viet-thong-bao') }}" method="post">
                    @csrf
                    <div class="tinymce-single mg-t-30">
                        <div class="alert-title form-group">
                            <label>Người nhận</label>
                            <select class="js-example-basic-multiple form-control" name="phuHuynh[]" multiple="multiple">
                                @foreach ($phuHuynh as $item)
                                    <option data-tokens="{{ $item->username }}" value="{{ $item->username }}">{{ $item->ph_hoten }}  ({{ $item->username }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="alert-title form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="tieuDe" class="form-control" placeholder="Nhập tiêu đề bài viết . . .">
                        </div>
                        <textarea id="summernote" name="noiDungThongBao">

                        </textarea>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('select-picker')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
@endsection
