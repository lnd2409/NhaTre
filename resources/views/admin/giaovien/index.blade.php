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
                        <strong>Thành công! </strong> {{ Session::get('alert') }}.
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <a href="{{ route('them-giao-vien') }}" class="btn btn-primary">Thêm giáo viên</a>
            </div>
            <br>
            <br>
            <div class="col-md-12" style="margin-top: 20px;">
                <ul id="myTabedu1" class="tab-review-design" style=" padding-top: 15px; padding-left: 20px;">
                    <li class="active"><a href="#description" style=" text-transform: uppercase;">Đã có lớp</a></li>
                    <li><a href="#reviews" style=" text-transform: uppercase;"> Chưa nhận lớp</a></li>
                </ul>
            </div>
        </div>
        <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade active in" id="description">
                @foreach ($danhSachGiaoVienDaCoLop as $item)
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 20px; padding-left: 0;">
                    <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                        <div class="panel-body custom-panel-jw">
                            @if ($item->gv_avata != '')
                                <img alt="avtar" class="img-circle m-b" width="250" height="250" src="{{ asset('hinh-anh-giao-vien/anh-dai-dien') }}/{{ $item->gv_avata }}">
                            @else
                                <img src="https://via.placeholder.com/250x250" class="img-circle m-b" alt="avtar">
                            @endif
                            <p class="text-center"><a href="#" class="editAvatar" data-toggle="modal" data-target="#editAvatar" data-id="{{ $item->gv_id }}">Cập nhật ảnh đại diện</a></p>
                            {{-- src="https://via.placeholder.com/230x185" --}}
                            <p><b>Họ tên:</b> {{ $item->gv_ten }}</p>
                            <p><b>Giáo viên:</b> {{ $item->lh_tenlop }}</p>
                            <p><b>Tên đăng nhập:</b> {{ $item->username }}</p>
                            <p><b>Địa chỉ:</b> {{ $item->gv_diachi }}</p>
                            <p><b>Số điện thoại:</b> {{ $item->gv_sdt }}</p>
                            <p><b>Ngày sinh:</b> {{ Carbon\Carbon::parse($item->gv_ngaysinh)->format('d/m/Y') }}</p>
                            <p><b>Giới tính:</b> {{ $item->gv_gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
                            <p><b>Bằng cấp:</b> {{ $item->gv_bangcap }}</p>
                            <p><b>Trạng thái: </b>
                                @if ($item->gv_trangthai)
                                    <span class="label label-success">Còn dạy</span>
                                @else
                                    <span class="label label-danger">Đã nghỉ</span>
                                @endif
                            </p>
                            <p class="text-center">
                                <a href="{{ route('reset-password-giao-vien', ['id'=> $item->gv_id]) }}" class="btn btn-custon-rounded-three btn-warning">
                                    <i class="fa fa-exclamation-triangle edu-warning-danger" aria-hidden="true"></i> Đặt lại mật khẩu
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer contact-footer text-center" style="background-color: unset;">
                            <a href="#" class="btn btn-info openModal" data-toggle="modal" data-target="#myModal" data-id="{{ $item->gv_id }}">Chỉnh sửa thông tin</a>
                            {{-- <a href="#" class="btn btn-danger">Xóa</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="product-tab-list tab-pane fade" id="reviews">
                @foreach ($danhSachGiaoVienChuaCoLop as $item)
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 20px; padding-left: 0;">
                    <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                        <div class="panel-body custom-panel-jw">
                            @if ($item->gv_avata != '')
                                <img alt="avtar" class="img-circle m-b" width="250" height="250" src="{{ asset('hinh-anh-giao-vien/anh-dai-dien') }}/{{ $item->gv_avata }}">
                            @else
                                <img src="https://via.placeholder.com/250x250" class="img-circle m-b" alt="avtar">
                            @endif
                            <p class="text-center"><a href="#" class="editAvatar" data-toggle="modal" data-target="#editAvatar" data-id="{{ $item->gv_id }}">Cập nhật ảnh đại diện</a></p>
                            {{-- src="https://via.placeholder.com/230x185" --}}
                            <p><b>Họ tên:</b> {{ $item->gv_ten }}</p>
                            <p>Chưa nhận lớp</p>
                            <p><b>Tên đăng nhập:</b> {{ $item->username }}</p>
                            <p><b>Địa chỉ:</b> {{ $item->gv_diachi }}</p>
                            <p><b>Số điện thoại:</b> {{ $item->gv_sdt }}</p>
                            <p><b>Ngày sinh:</b> {{ Carbon\Carbon::parse($item->gv_ngaysinh)->format('d/m/Y') }}</p>
                            <p><b>Giới tính:</b> {{ $item->gv_gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
                            <p><b>Bằng cấp:</b> {{ $item->gv_bangcap }}</p>
                            <p><b>Trạng thái: </b>
                                @if ($item->gv_trangthai)
                                    <span class="label label-success">Còn dạy</span>
                                @else
                                    <span class="label label-danger">Đã nghỉ</span>
                                @endif
                            </p>
                            <p class="text-center">
                                <a href="{{ route('reset-password-giao-vien', ['id'=> $item->gv_id]) }}" class="btn btn-custon-rounded-three btn-warning">
                                    <i class="fa fa-exclamation-triangle edu-warning-danger" aria-hidden="true"></i> Đặt lại mật khẩu
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer contact-footer text-center" style="background-color: unset;">
                            <a href="#" class="btn btn-info openModal" data-toggle="modal" data-target="#myModal" data-id="{{ $item->gv_id }}">Chỉnh sửa thông tin</a>
                            {{-- <a href="#" class="btn btn-danger">Xóa</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
                        <input type="date" autocomplete="off" name="ngaySinh" class="form-control" id="ngaySinh">
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
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Bằng cấp</label>
                        <select class="form-control" name="bangCap">
                          <option value="Trung cấp" id="trungCap">Trung cấp</option>
                          <option value="Cao đẳng" id="caoDang">Cao đẳng</option>
                          <option value="Đại học" id="daiHoc">Đại học</option>
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
<div id="editAvatar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhật ảnh đại diện</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('cap-nhat-avata-giao-vien') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="idGiaoVien" id="idGiaoVienAvata" hidden>
                        <img src="" height="300" width="300" alt="Ảnh đại diện" id="avatar">
                        <input type="file" class="form-control" name="anhDaiDien" id="imgInp">
                        <br>
                        <button class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center">Kiểm tra kỹ thông tin trước khi cập nhật</p>
            </div>
        </div>
    </div>
</div>
@push('giao-vien')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $("#imgInp").change(function() {
        readURL(this);
    });
    $(document).ready(function(){
        $(document).on('click','.openModal',function(){
            var id = $(this).data('id');
            var url = "{!! asset('') !!}";
            console.log(url);
            console.log(id);
            $.ajax({
                type: "GET",
                url: url + "quan-ly-giao-vien/chi-tiet/" + id,
                dataType: "json",
                success: function (response) {
                    $('#idGiaoVien').val(response.gv_id);
                    $('#tenGiaoVien').val(response.gv_ten);
                    $('#diaChi').val(response.gv_diachi);
                    $('#ngaySinh').val(response.gv_ngaysinh);
                    $('#sdt').val(response.gv_sdt);
                    $('#bangCap').val(response.gv_bangcap);
                    if(response.gv_gioitinh == 0){
                        $('#women').attr("selected","selected");
                    }else{
                        $('#men').attr("selected","selected");
                    }

                    if(response.gv_bangcap == 'Trung cấp'){
                        $('#trungCap').attr("selected","selected");
                    } else if(response.gv_bangcap == 'Cao đẳng'){
                        $('#caoDang').attr("selected","selected");
                    }else if(response.gv_bangcap == 'Đại học'){
                        $('#daiHoc').attr("selected","selected");
                    }


                    $('#gioiTinh').val(response.gv_gioitinh);
                    console.log(response);
                }
            });
        });
        $(document).on('click','.editAvatar',function(){
            var id = $(this).data('id');
            var url = "{!! asset('') !!}";
            console.log(url);
            console.log(id);
            $.ajax({
                type: "GET",
                url: url + "quan-ly-giao-vien/chi-tiet/" + id,
                dataType: "json",
                success: function (response) {
                    var url_img = "{!! asset('giao-vien/anh-dai-dien') !!}/";
                    $('#idGiaoVienAvata').val(id);
                    // console.log(response.gv_id);
                    if (response.gv_avata == null) {
                        $('#avatar').attr('src', 'https://via.placeholder.com/300x300');
                    }else
                    {
                        $('#avatar').attr('src', url_img+response.gv_avata);
                    }
                }
            });
        });
    });
</script>
@endpush
@endsection

