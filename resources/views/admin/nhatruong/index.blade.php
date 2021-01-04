@extends('admin.template.master')
@section('title')
    Thông tin trường
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
                                    <li><span class="bread-blod">Thông tin trường</span>
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
                <div class="blog-details-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="latest-blog-single blog-single-full-view">
                                <div class="blog-image">
                                    @if ($data->nt_anhdaidien == NULL)
                                        <a href="#">
                                            <img src="https://via.placeholder.com/1250x450" alt="Ảnh đại diện">
                                        </a>
                                    @else
                                        <a href="">
                                            <img src="{{ asset('template') }}/img/blog-details/1.jpg" alt="Ảnh đại diện">
                                        </a>
                                    @endif
                                        {{-- <img src="{{ asset('template') }}/img/blog-details/1.jpg" alt="Ảnh đại diện"> --}}
                                    <div class="blog-date">
                                        {{-- {{ Carbon\Carbon::parse($data->created_at)->day }} --}}
                                        <p>
                                            <span class="blog-day">{{ Carbon\Carbon::parse($data->created_at)->day }}</span>
                                            /
                                            <span class="blog-day">{{ Carbon\Carbon::parse($data->created_at)->month }}</span>
                                            <br>
                                            <span class="blog-day">{{ Carbon\Carbon::parse($data->created_at)->year }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="blog-details blog-sig-details">
                                    <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                                        <span><a href="#"><b>Tên trường:</b> {{ $data->nt_tentruong }}</a></span>
                                        <span><a href="#"><b>Địa chỉ:</b> {{ $data->nt_diachi }}</a></span>
                                        <span><a href="#"><b>Số điện thoại:</b> {{ $data->nt_sodienthoai }}</a></span>
                                    </div>
                                    <h1><a class="blog-ht" href="#">Giới thiệu chung</a></h1>
                                    <p>
                                        @if ($data->nt_gioithieuchung == NULL)
                                            <a href="#" data-toggle="modal" data-target="#gioiThieuChung">Thêm giới thiệu</a>
                                            {{-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#my-modal">Content</button> --}}
                                        @else
                                            {{ $data->nt_gioithieuchung }}
                                        @endif
                                    </p>
                                    <p>
                                        @if ($data->nt_gioithieuchung != NULL)
                                            <a href="#">Chỉnh sửa nội dung</a>
                                        @else
                                            {{-- {{ $data->nt_gioithieuchung }} --}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="comment-head">
                                <h3>Thành phần</h3>
                            </div>
                        </div>
                    </div>
                    {{-- giới thiệu ban giám hiệu --}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="user-comment">
                                <img src="{{ asset('template') }}/img/contact/1.jpg" alt="">
                                <div class="comment-details">
                                    <h4>Ban giám hiệu</h4>
                                    <p>
                                        @if ($data->nt_gioithieubangiamhieu)
                                            {{ $data->nt_gioithieubangiamhieu }}
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#banGiamHieu">Thêm phần giới thiệu ban giám hiệu</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- giới thiệu giáo viên --}}
                    <div class="row">
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="user-comment">
                                <img src="{{ asset('template') }}/img/contact/1.jpg" alt="">
                                <div class="comment-details">
                                    <h4>Giáo viên</h4>
                                    <p>
                                        @if ($data->nt_gioithieugiaovien)
                                            {{ $data->nt_gioithieugiaovien }}
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#giaoVien">Thêm phần giới thiệu giáo viên</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- giới thiệu cơ sở vật chất --}}
                    <div class="row">
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="user-comment">
                                <img src="{{ asset('template') }}/img/contact/1.jpg" alt="">
                                <div class="comment-details">
                                    <h4>Cơ sở vật chất</h4>
                                    <p>
                                        @if ($data->nt_gioithieucosovatchat)
                                            {{ $data->nt_gioithieucosovatchat }}
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#coSoVatChat">Thêm phần giới thiệu cơ sở vật chất</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal add --}}
<div id="gioiThieuChung" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('nha-truong.them-gioi-thieu-chung') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Giới thiệu chung</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="gioiThieuChung" required id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Thêm</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="banGiamHieu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('nha-truong.them-gioi-thieu-ban-giam-hieu') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Giới thiệu ban giám hiệu</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="gioiThieuBanGiamHieu" required id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Thêm</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="giaoVien" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('nha-truong.them-gioi-thieu-giao-vien') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Giới thiệu giáo viên</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="gioiThieuGiaoVien" required id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Thêm</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="coSoVatChat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('nha-truong.them-gioi-thieu-co-so-vat-chat') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Giới thiệu cơ sở vật chất</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="gioiThieuCoSoVatChat" required id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Thêm</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end modal add --}}

{{-- modal avt --}}
<div id="avata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Content</p>
            </div>
            <div class="modal-footer">
                Footer
            </div>
        </div>
    </div>
</div>
@endsection
