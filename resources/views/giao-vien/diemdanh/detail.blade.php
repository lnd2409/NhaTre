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
                    <h4>Danh sách điểm danh ngày {{ Carbon\Carbon::now()->format('d-m-Y') }}</h4>
                    <div class="add-product">
                        <a href="{{ route('giao-vien.diem-danh') }}" >Quay lại</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Họ tên</th>
                                    {{-- <th>Ngày nghỉ</th> --}}
                                    <th>Trạng thái</th>
                                    <th>Nghỉ phép</th>
                                    {{-- <th>Người viết</th> --}}
                                    {{-- <th>Thao tác</th> --}}
                                </tr>
                                @foreach ($hocSinh as $item)
                                <tr>
                                    <td>HS-{{ $item->hs_id }}</td>
                                    <td>{{ $item->hs_hoten }}</td>
                                    <td>
                                        @if (!empty($chiTiet[$item->hs_id]))
                                            @if ($chiTiet[$item->hs_id]->ctdd_trangthai == 1)
                                                <a href="{{ route('giao-vien.check-diem-danh', ['idStudent'=> $item->hs_id,'trangThai' => 2,'idClass' => $item->lh_id]) }}" title="Vắng mặt" class="pd-setting">Có</a>
                                            @endif
                                            @if($chiTiet[$item->hs_id]->ctdd_trangthai == 2)
                                                <a href="{{ route('giao-vien.check-diem-danh', ['idStudent'=> $item->hs_id,'trangThai' => 1,'idClass' => $item->lh_id]) }}" title="Có mặt" class="ds-setting">Vắng</a>
                                            @endif
                                            @if($chiTiet[$item->hs_id]->ctdd_trangthai == NULL)
                                                <a href="{{ route('giao-vien.check-diem-danh', ['idStudent'=> $item->hs_id,'trangThai' => 1,'idClass' => $item->lh_id]) }}" class="pd-setting">Có</a>
                                                <a href="{{ route('giao-vien.check-diem-danh', ['idStudent'=> $item->hs_id,'trangThai' => 2,'idClass' => $item->lh_id]) }}" class="ds-setting">Vắng</a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>Có || Không</td>
                                    {{-- <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td> --}}
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
