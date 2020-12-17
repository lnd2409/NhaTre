@extends('admin.template.master')
@section('title')
    Thêm giáo viên
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
                                    <li><span class="bread-blod">Thêm giáo viên</span>
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
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Thông tin giáo viên</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            <form action="{{ route('xu-ly-themm-giao-vien') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">Họ tên</label>
                                                            <input name="hoTen" type="text" class="form-control" placeholder="Họ tên">
                                                        </div>
                                                        <label>Địa chỉ</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    {{-- <input name="diaChi" type="text" class="form-control" placeholder="Địa chỉ"> --}}
                                                                    <select name="thanhPho" id="" class="thanhPho form-control col-md-4">
                                                                        <option value="null" lang="123">Chọn thành phố</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="quanHuyen" id="" class="quanHuyen form-control col-md-4">
                                                                        <option value="null" class="delQH">Quận - Huyện</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="phuongXa" id="" class="phuongXa form-control col-md-4">
                                                                        <option value="null" class="delPX" lang="123">Phường-Xã</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" style="margin-top: 15px;">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Số nhà, tên đường . . ." name="tenDuong">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Số điện thoại</label>
                                                            <input name="sdt" type="number" class="form-control" placeholder="Số điện thoại">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ngày sinh</label>
                                                            <input name="ngaySinh" id="finish" type="date" class="form-control hasDatepicker" placeholder="Ngày sinh">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Giới tính</label>
                                                            <select name="gioiTinh" class="form-control">
                                                                <option value="null">Chọn giới tính</option>
                                                                <option value="1">Nam</option>
                                                                <option value="0">Nữ</option>
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
                                                        <div class="form-group res-mg-t-15">
                                                            <label>Ảnh đại diện</label>
                                                            <br>
                                                            <img id="blah" src="https://via.placeholder.com/230x185" alt="your image" width="120" height="150" />
                                                            <input type="file" class="form-control" name="anhDaiDien" id="imgInp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Xác nhận</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
            }

            $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
    <script>
        $(document).ready(function() {
            var jsonFile = "{{ asset('admin-he-thong') }}/"+"local.json";
            $.getJSON(jsonFile, function(js) {
                console.log(js.length);
                for (let i = 0; i < js.length; i++) {
                    $('.thanhPho').append('<option class="value-tp" value="' + js[i].name + '" lang="' + js[i].id + '" >' + js[i].name + '</option>');
                }

                //lấy Quận huyện
                $('select.thanhPho').change(function (e) {
                    e.preventDefault();
                    $('.value-qh').remove();
                    $('.delQH').remove();
                    $('.delPX').remove();
                    $('.value-px').remove();
                    var getIDThanhPho = $(this).children("option:selected").attr("lang");
                    console.log(getIDThanhPho);
                    $.getJSON(jsonFile,
                        function (data) {
                            for (let i = 0; i < data.length; i++) {
                                // $('.thanhPho').append('<option class="value-tp" value="' + js[i].id + '" >' + js[i].name + '</option>');
                                if(data[i].id == getIDThanhPho){
                                    console.log(data[i].districts.length);
                                    for (let j = 0; j < data[i].districts.length; j++) {
                                        $('.quanHuyen').append('<option class="value-qh" value="' + data[i].districts[j].name + '" lang="' + data[i].districts[j].id + '" >' + data[i].districts[j].name + '</option>');
                                    }
                                    //Lấy phường xã
                                    $('select.quanHuyen').change(function (e) {
                                        e.preventDefault();
                                        $('.value-px').remove();
                                        $('.delPX').remove();
                                        var getIDQuanHuyen = $(this).children("option:selected").attr("lang");
                                        // console.log(data[i].districts);
                                        for (let k = 0; k < data[i].districts.length; k++) {
                                            // console.log('')
                                            if(data[i].districts[k].id == getIDQuanHuyen){
                                                console.log(data[i].districts[k].wards);
                                                for (let l = 0; l < data[i].districts[k].wards.length; l++) {
                                                    $('.phuongXa').append('<option class="value-px" value="' + data[i].districts[k].wards[l].name + '" lang="' + data[i].districts[k].wards[l].id + '" >' + data[i].districts[k].wards[l].name + '</option>');
                                                }
                                            }
                                        }
                                        console.log(getIDQuanHuyen);
                                    });
                                }
                            }
                        }
                    );
                });
            });
        });
     </script>
@endpush
@endsection
