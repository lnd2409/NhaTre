@extends('admin.template.master')
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
                    <div class="asset-inner">
                        <table>
                            <tbody><tr>
                                <th>Mã đơn</th>
                                <th>Nội dung</th>
                                <th>Ngày nghỉ</th>
                                <th>Trạng thái đơn</th>
                                <th>Học sinh</th>
                                <th>Người viết</th>
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
                                            <a href="#" class="ds-setting" title="Duyệt">Chưa duyệt</a>
                                        @else
                                            <a class="pd-setting" disabled>Đã duyệt</a>
                                        @endif
                                    </td>
                                    <td>{{ $item->hs_hoten }}</td>
                                    <td>{{ $item->ph_hoten }}</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Xóa đơn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- phân trang --}}
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
