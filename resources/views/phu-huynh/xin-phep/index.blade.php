@extends('phu-huynh.template.master')
@section('title')
    Đơn xin phép
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Đơn xin phép</h4>
                    <div class="add-product">
                        <a href="#" data-toggle="modal" data-target="#donXinPhep">Tạo đơn</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody><tr>
                                <th>Mã đơn</th>
                                <th>Nội dung</th>
                                <th>Ngày nghỉ</th>
                                <th>Trạng thái đơn</th>
                                {{-- <th>Học sinh</th> --}}
                                <th>Thao tác</th>
                            </tr>
                            @foreach ($donXinPhep as $item)
                                <tr>
                                    <td>{{ $item->dxp_id }}</td>
                                    <td>{{ $item->dxp_noidung }}</td>
                                    <td>
                                        @if (!empty($ngayNghi[$item->dxp_id]))
                                            {{-- {{ $ngayNghi[$item->dxp_id]->count() }} --}}
                                            <?php $dem = $ngayNghi[$item->dxp_id]->count() ?>
                                            <b>Từ:</b>
                                            <span>{{ Carbon\Carbon::parse($ngayNghi[$item->dxp_id][0]->ctdxp_ngay)->format('d/m/Y') }}</span>
                                            <br>
                                            <b>Đến:</b>
                                            <span>{{ Carbon\Carbon::parse($ngayNghi[$item->dxp_id][$dem-1]->ctdxp_ngay)->format('d/m/Y') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- {{ $item->dxp_trangthai }} --}}
                                        @if ($item->dxp_trangthai == 0)
                                            <button class="ds-setting">Chưa duyệt</button>
                                        @else
                                            <button class="pd-setting">Đã duyệt</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Sửa đơn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Xóa đơn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- phân trang --}}
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="donXinPhep" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('phu-huynh.xu-ly-don-xin-phep') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <h4 class="modal-title">Đơn xin phép</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nghỉ từ ngày</label>
                                <input type="date" name="ngayBatDau" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Đến</label>
                                <input type="date" name="ngayKetThuc" id="" class="form-control">
                                <small class="form-text text-muted">Bỏ qua nếu chỉ nghỉ 1 ngày.</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lý do</label>
                                <textarea type="text" name="lyDo" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#" class="btn btn-default">Đóng</a>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
