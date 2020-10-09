
@extends('admin.template.master')
@section('title')
    lớp học
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
                                    <li><span class="bread-blod">Quản lý món ăn</span>
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
                <div class="product-status-wrap drp-lst">
                    <h4>Danh sách món ăn</h4>
                    <div class="add-product">
                        <a href="#" data-toggle="modal" class="openModal" data-target="#modalMonAn">Thêm món</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody><tr>
                                <th>Mã món</th>
                                <th>Tên món ăn</th>
                                <th>Tháo tác</th>
                            </tr>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($monAn as $item)
                                <tr>
                                    <td>{{ $item->ma_id }}</td>
                                    <td>{{ $item->ma_ten }}</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody></table>
                    </div>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            {{ $monAn->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalMonAn" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Thêm món ăn mới</h3>
            </div>
            <div class="modal-body">
                    <form action="{{ route('them-mon-an') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên món</label>
                            <input type="text" autocomplete="off" name="tenMon" class="form-control" placeholder="Nhập tên món ăn . . .">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Thêm">
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>

@endsection
