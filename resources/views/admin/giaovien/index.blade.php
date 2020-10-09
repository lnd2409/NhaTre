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
                                        <input type="text" placeholder="Tìm kiếm..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Danh sách giáo viên</span>
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
            <div class="col-md-12">
                @if (Session::has('alert'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Thành công! </strong> Hoàn tất cập nhật thông tin.
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($danhSachGiaoVien as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px;">
                <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                    <div class="panel-body custom-panel-jw">
                        <img alt="logo" class="img-circle m-b" src="{{ asset('template') }}/img/contact/1.jpg">
                        <h3><a href="">{{ $item->gv_ten }}</a></h3>
                        <p><b>Tên đăng nhập:</b> {{ $item->username }}</p>
                        <p><b>Địa chỉ:</b> {{ $item->gv_diachi }}</p>
                        <p><b>Số điện thoại:</b> {{ $item->gv_sdt }}</p>
                        <p><b>Ngày sinh:</b> {{ $item->gv_ngaysinh }}</p>
                        <p><b>Giới tính:</b> {{ $item->gv_gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
                        <p class="text-center">
                            <a href="{{ route('reset-password-giao-vien', ['id'=> $item->gv_id]) }}" class="btn btn-custon-rounded-three btn-warning">
                                <i class="fa fa-exclamation-triangle edu-warning-danger" aria-hidden="true"></i> Đặt lại mật khẩu
                            </a>
                        </p>
                    </div>
                    <div class="panel-footer contact-footer text-center" style="background-color: unset;">
                        <a href="#" class="btn btn-info openModal" data-toggle="modal" data-target="#myModal" data-id="{{ $item->gv_id }}">Chỉnh sửa</a>
                        <a href="#" class="btn btn-danger">Xóa</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh sửa thông tin giáo viên </h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('xu-ly-sua-giao-vien') }}" method="POST">
                    @csrf
                    <input type="text" name="idGiaoVien" id="idGiaoVien" hidden>
                    <div class="form-group">
                        <label>Tên giáo viên</label>
                        <input type="text" autocomplete="off" name="hoTen" class="form-control" id="tenGiaoVien">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" autocomplete="off" name="diaChi" class="form-control" id="diaChi">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" autocomplete="off" name="ngaySinh" class="form-control" id="ngaySinh">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" autocomplete="off" name="sdt" class="form-control" id="sdt">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <select class="form-control" name="gioiTinh">
                          <option value="1" id="men">Nam</option>
                          <option value="0" id="women">Nữ</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center">Kiểm tra kỹ thông tin trước khi cập nhật</p>
            </div>
        </div>

    </div>
</div>
@endsection

