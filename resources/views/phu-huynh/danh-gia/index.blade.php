@extends('phu-huynh.template.master')
@section('title')
    Đánh giá
@endsection
@push('rating')
    <link rel="stylesheet" href="font-awesome.min.css">
    <style>
        input {
        border: 0;
        width: 1px;
        height: 1px;
        overflow: hidden;
        position: absolute !important;
        clip: rect(1px 1px 1px 1px);
        clip: rect(1px, 1px, 1px, 1px);
        opacity: 0;
        }

        .stars {
        position: relative;
        float: right;
        color: #C8C8C8;
        }

        .stars:before {
        margin: 5px;
        content: "\f005";
        font-family: FontAwesome;
        display: inline-block;
        font-size: 1.5em;
        color: #ccc;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        }

        input:checked ~ label:before {
        color: #FFC107;
        }

        .stars:hover ~ .stars:before {
        color: #ffdb70;
        }

        .stars:hover:before {
        color: #FFC107;
        }
    </style>
@endpush
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
                                    <li><span class="bread-blod">Đánh giá</span>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Đánh giá</h3>
                    <?php
                        $danhGia = DB::table('danhgia')->where('ph_id',Auth::guard('phuhuynh')->id())->first();
                    ?>
                    @if ($danhGia)
                        {{-- {{ $review }} --}}
                        <p>Cám ơn bạn đã đánh giá</p>
                        <div style="float: left;">
                            @for ($i = 1; $i <= $review->dg_diem; $i++)
                                <input type="checkbox" id="st1" value="5" name="diemSo" checked/>
                                <label for="st1" class="stars"></label>
                            @endfor
                        </div>
                        <div class="form-group" >
                            <br>
                            <textarea id="noiDung" class="form-control"  name="noiDung" rows="3" readonly>{{ $review->dg_noidung }}</textarea>
                        </div>
                    @else
                        <form method="post" action="{{ route('phu-huynh.xu-ly-danh-gia') }}">
                            @csrf
                            <div class="form-group">
                                <div style="float: left;">
                                    <input type="checkbox" id="st1" value="5" name="diemSo"/>
                                    <label for="st1" class="stars"></label>
                                    <input type="checkbox" id="st2" value="4" name="diemSo"/>
                                    <label for="st2" class="stars"></label>
                                    <input type="checkbox" id="st3" value="3" name="diemSo"/>
                                    <label for="st3" class="stars"></label>
                                    <input type="checkbox" id="st4" value="2" name="diemSo"/>
                                    <label for="st4" class="stars"></label>
                                    <input type="checkbox" id="st5" value="1" name="diemSo"/>
                                    <label for="st5" class="stars"></label>
                                </div>
                            </div>
                            <div class="form-group" >
                                <br>
                                <textarea id="noiDung" class="form-control"  name="noiDung" rows="3" placeholder="Nhập nội dung góp ý. . ."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đánh giá</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
