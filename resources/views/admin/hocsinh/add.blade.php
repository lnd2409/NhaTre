@extends('admin.template.master')
@section('title')
    Thêm học sinh
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
                                    <li><span class="bread-blod">Thêm học sinh</span>
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
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Tạo thông tin học sinh</a></li>
                    </ul>
                    {{-- {{ dd($selectKhoiHoc) }} --}}
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            <form action="{{ route('hocsinh.xu-ly-them') }}" method="POST" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" enctype="multipart/form-data" novalidate="novalidate">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Họ tên học sinh:</label>
                                                            <input name="hoTen" type="text" class="form-control" placeholder="Họ tên">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nơi sinh:</label>
                                                            <select name="noiSinh" id="" class="noiSinh form-control col-md-4">
                                                                {{-- <option value="null" lang="123">Chọn thành phố</option> --}}
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="">Ngày sinh</label>
                                                            <input name="ngaySinh" id="finish" type="date" class="form-control hasDatepicker" placeholder="Ngày sinh">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Giới tính</label>
                                                            <select name="gioiTinh" class="form-control">
                                                                <option value="none" selected="" disabled="">Giới tính</option>
                                                                <option value="1">Nam</option>
                                                                <option value="0">Nữ</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Khối học</label>
                                                            <select name="khoiHoc" class="form-control khoiHoc">
                                                                <option value="NULL">Chọn khối học</option>
                                                                @foreach ($selectKhoiHoc as $item)
                                                                    <option value="{{ $item->kh_id }}" >{{ $item->kh_tenkhoi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Lớp học:</label>
                                                            <select name="lopHoc" class="form-control lopHoc">
                                                                <option value="" id="delKhoiHoc" spellcheck="true">Chọn lớp học</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Hình ảnh</label>
                                                            <br>
                                                            <img id="blah" src="https://via.placeholder.com/230x185" alt="your image" width="120" height="150" />
                                                            <input type="file" class="form-control" name="anhDaiDien" id="imgInp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phụ huynh của học sinh</label>
                                                            <select class="selectpicker form-control" data-live-search="true" name="phuHuynh">
                                                                @foreach ($phuHuynh as $item)
                                                                    <option data-tokens="{{ $item->ph_id }}" value="{{ $item->ph_id }}">{{ $item->ph_hoten }}</option>
                                                                @endforeach
                                                            </select>
                                                            <br>
                                                            <br>
                                                            <a href="{{ route('them-phu-huynh') }}" class="btn btn-primary">Thêm thông tin phụ huynh</a>
                                                            <p><i>(Nếu không có thông tên phụ huynh trong form nhập)</i></p>
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
@push('select-picker')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endpush
@push('ajax-get-class')
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
        $('select.khoiHoc').change(function (e) {
            e.preventDefault();
            var getID = $(this).children("option:selected").val();
            console.log(getID);
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/lop-hoc/get/"+getID,
                dataType: "json",
                success: function (response) {
                    $('.value-lh').remove();
                    $('#delKhoiHoc').remove();
                    console.log(response);
                    if(response == '')
                    {
                        $('.lopHoc').append('<option class="value-lh" value="' + 'NULL' + '" >' + 'Hãy chọn khối học' + '</option>');
                    }
                    for (let i = 0; i < response.length; i++) {
                        console.log(response[i].lh_tenlop);
                        $('.lopHoc').append('<option class="value-lh" value="' + response[i].lh_id + '" >' + response[i].lh_tenlop + '</option>');
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var jsonFile = "{{ asset('admin-he-thong') }}/"+"local.json";
            $.getJSON(jsonFile, function(js) {
                console.log(js.length);
                for (let i = 0; i < js.length; i++) {
                    $('.noiSinh').append('<option class="value-tp" value="' + js[i].name + '" lang="' + js[i].id + '" >' + js[i].name + '</option>');
                }
            });
        });
    </script>
@endpush
@endsection
