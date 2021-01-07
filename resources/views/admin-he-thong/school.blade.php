@extends('admin-he-thong.template.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <a href="{{ route('quan-tri.danh-sach-truong', ['id'=>1]) }}" class="au-btn au-btn-icon au-btn--blue">Quay lại</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ $data->nt_tentruong }}</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $hocSinh }}</h2>
                        <span>học sinh</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $lopHoc }}</h2>
                        <span>lớp</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $giaoVien }}</h2>
                        <span>giáo viên</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                    <div class="text">
                        <h2>$1,060,386</h2>
                        <span>Tổng tiền donate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <!-- TOP CAMPAIGN-->
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Thông tin liên hệ</h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <tbody>
                        <tr>
                            <td>Tên trường:</td>
                            <td>{{ $data->nt_tentruong }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td>{{ $data->nt_diachi }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td>{{ $data->nt_sodienthoai }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ $data->nt_email }}</td>
                        </tr>
                        <tr>
                            {{-- <td>:</td> --}}
                            <td colspan="2" class="text-center">
                                <a href="#" class="btn btn-warning">Đặt lại mật khẩu</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--  END TOP CAMPAIGN-->
    </div>
</div>
@endsection
