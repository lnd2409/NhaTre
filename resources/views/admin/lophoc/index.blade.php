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
                                    <li><span class="bread-blod">Danh sách lớp học</span>
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
                <div class="sparkline8-list">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Danh sách lớp {{ $tenKhoi->kh_tenkhoi }}</h1>
                        </div>
                        <div class="main-sparkline8-hd">
                            {{-- {{ route('nha-truong.sap-lich-hoat-dong', ['idClass' => $tenKhoi->kh_id]) }} --}}
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#activeModal">Tạo lịch hoạt động</a>

                        </div>
                    </div>
                    <div class="sparkline8-graph">
                        <div class="static-table-list">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã lớp</th>
                                        <th>Tên lớp</th>
                                        <th>Giáo viên quản lý</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dsLop as $item)
                                    <tr>
                                        <td>{{ $item->lh_id }}</td>
                                        <td>{{ $item->lh_tenlop }}</td>
                                        <td>
                                            @if (!empty($giaoVien[$item->lh_id]))
                                                @foreach ($giaoVien[$item->lh_id] as $item)
                                                    {{ $item->gv_ten }}
                                                    <br>
                                                @endforeach
                                            @else
                                                Chưa có giáo viên quản lý (Vào chi tiết để thêm)
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('chi-tiet-lop-hoc', ['id' => $item->lh_id]) }}" class="btn btn-default">Chi tiết</a>
                                            <a href="{{ route('nha-truong.lich-hoat-dong-chi-tiet', ['idClass'=> $item->lh_id]) }}">Chi tiết lịch hoạt động</a>
                                            <a href="#" class="btn btn-success">Sửa</a>
                                            <a href="#" class="btn btn-danger">Xóa</a>
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
</div>
<div class="modal fade" id="activeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('nha-truong.sap-lich-hoat-dong', ['idClass' => $tenKhoi->kh_id]) }}" method="get">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sắp lịch hoạt động</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Ngày bắt áp dụng</label>
                <input type="date" class="form-control" name="ngayApDung">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Áp dụng</button>
        </div>
        </div>
    </form>
  </div>
</div>
@endsection
