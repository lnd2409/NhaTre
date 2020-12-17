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
                    <div class="col-md-12">
                        <a href="{{ route('danh-sach-lop-hoc', ['idKhoi'=> $tenLop->kh_id ]) }}" class="btn btn-sm btn-warning">Quay lại</a>
                    </div>
                    <div class="col-md-12" style="padding-left: 0px;">
                        <h2>Danh sách học sinh {{ $tenLop->lh_tenlop }}</h2>
                        <p>Số lượng: {{ $countStudent }} học sinh</p>
                        <p>
                            <b>Giáo viên quản lý
                                <br>
                                @if (count($giaoVien))
                                    @foreach ($giaoVien as $item)
                                        {{ $item->gv_ten }}
                                        <br>
                                    @endforeach
                                    @if (count($giaoVien) < 2)
                                        <a href="#" data-toggle="modal" data-target="#exampleModal">Cần thêm 1 giáo viên quản lý</a>
                                    @endif
                                @else
                                    <a href="#" data-toggle="modal" data-target="#exampleModal">Chọn giáo viên quản lý</a>
                                @endif
                            </b>
                        </p>
                    </div>
                    <div class="asset-inner">
                        <table class="table table-bordered data-table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Nơi sinh</th>
                                    <th>Ngày sinh</th>
                                    {{-- <th>Lớp</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('lophoc.them-giao-vien-quan-ly') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chọn giáo viên quản lý: {{ $tenLop->lh_tenlop }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" value="{{ $tenLop->lh_id }}" name="lopHoc">
                            <div class="form-group">
                                <label>Giáo viên chính</label>
                                <select class="selectpicker form-control" data-live-search="true" name="giaoVien1">
                                    @foreach ($giaoVienSelect as $item)
                                        @if ($item->lh_id == NULL)
                                            <option data-tokens="{{ $item->gv_id }}" value="{{ $item->gv_id }}">{{ $item->gv_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giáo viên phụ</label>
                                <select class="selectpicker form-control" data-live-search="true" name="giaoVien2">
                                    @foreach ($giaoVienSelect as $item)
                                        @if ($item->lh_id == NULL)
                                            <option data-tokens="{{ $item->gv_id }}" value="{{ $item->gv_id }}">{{ $item->gv_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('select-picker')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endpush
@endsection
