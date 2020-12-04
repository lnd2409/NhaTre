@extends('admin.template.master')
@section('title')
    Giáo viên - Sổ bé ngoan
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
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Sổ bé ngoan</span>
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
    <div class="container-fluid" style="margin-left: 20px;">
        <div class="row">
            <div class="col-md-4">
                <h2>SỔ BÉ NGOAN</h2>
                <h3>Tháng <span id="thangHienThi">{{ Carbon\Carbon::now()->month }}</span></h3>
            </div>
            <div class="col-md-4">
                <form action="">
                    <div class="form-group">
                        <label>Chọn tháng cần xem</label>
                        <select name="" id="selectMonth" class="form-control">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ Carbon\Carbon::now()->month == $i ? 'selected' : '' }}>Tháng {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-info-inner">
                                <div class="profile-img">
                                    <img src="{{ asset('template') }}/img/profile/1.jpg" alt="">
                                </div>
                                <div class="profile-details-hr">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Họ tên</b><br> {{ $hocSinh->hs_hoten }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Ngày sinh</b><br> {{ $hocSinh->hs_ngaysinh }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Giới tính</b><br> {{ $hocSinh->hs_gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Số điện thoại phụ huynh</b><br> {{ $hocSinh->ph_sdt }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="address-hr">
                                                <p><b>Nơi sinh</b><br> {{ $hocSinh->hs_noisinh }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" id="vietNhanXet">
                            @if ($soBeNgoan)

                            @else
                                <a href="#" class="btn btn-md btn-primary" data-toggle="modal" id="btnNhanXet" data-target="#exampleModal">Viết nhận xét</a>
                            @endif
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Học tập</a></li>
                                    <li><a href="#INFORMATION"> Sức khỏe</a></li>
                                    <li><a href="#reviews">Góp ý của phụ huynh</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row mg-b-15">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Nhận xét của giáo viên</h2>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro" id="nhanXetChung">
                                                                @if ($soBeNgoan)
                                                                    <p>{{ $soBeNgoan->sbn_nhanxetchung }}</p>
                                                                @else
                                                                    <p>Chưa có nhận xét tháng này</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div class="row mg-b-15">
                                                                    <div class="col-lg-12">
                                                                        <div class="skill-title">
                                                                            <h2>Hoa bé ngoan</h2>
                                                                            <hr>
                                                                            <div id="hoaBeNgoan">
                                                                                @if ($soBeNgoan != null)
                                                                                    @for ($i = 1; $i <= $soBeNgoan->sbn_hoctap; $i++)
                                                                                        <img src="{{ asset('') }}admin-he-thong/images/hoa-be-ngoan.png" alt="Hoa bé ngoan" width="20%" title="Bông {{ $i }}">
                                                                                    @endfor
                                                                                @else
                                                                                    <p>Chưa nhập sổ bé ngoan tháng này</p>
                                                                                @endif
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
                                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row mg-b-15">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Sức khỏe của bé</h2>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                @if ($soBeNgoan)
                                                                    <p>Chiều cao: <span id="chieuCao">{{ $soBeNgoan->sbn_chieucao }} cm</span></p>
                                                                    <p>Cân nặng: <span id="canNang">{{ $soBeNgoan->sbn_cannang }} kg</span></p>
                                                                    <p>Tình trạng: <span id="sucKhoe">{{ $soBeNgoan->sbn_suckhoe }}</span></p>
                                                                @else
                                                                    <p>Chưa có dữ liệu tháng này</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-tab-list tab-pane fade" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="chat-discussion" style="height: auto">
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                  <img class="message-avatar" src="{{ asset('template') }}/img/contact/1.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Phụ huynh nè </a>
                                                                <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
                                                                <span class="message-content">Tháng này sao con tui ốm quá dị</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('giao-vien.viet-so-be-ngoan', ['idStudent'=>$hocSinh->hs_id]) }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Viết nhận xét tháng {{ Carbon\Carbon::now()->month }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" name="thang" value="{{ Carbon\Carbon::now()->month }}">
                    <div class="form-group">
                        <label for="">Học tập (số hoa bé ngoan)</label>
                        <select name="hocTap" id="" class="form-control">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }} bông</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Chiều cao (cm)</label>
                        <input type="text" class="form-control" autocomplete="off" name="chieuCao">
                    </div>

                    <div class="form-group">
                        <label for="">Cân nặng (kg)</label>
                        <input class="form-control" type="text" name="canNang" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Nhận xét chung</label>
                        <textarea name="nhanXetChung" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <a href="" hidden></a> --}}
@push('so-be-ngoan')
    <script>
        $(document).ready(function () {
            var url = "{{ url('/') }}";
            console.log(url);
            //Chọn tháng của sổ bé ngoan
            $("#selectMonth").change(function (e) {
                e.preventDefault();
                var monthSelected = $(this).val();
                // console.log(monthSelected);
                $.ajax({
                    type: "get",
                    url: url + "/giao-vien/" + "hoc-sinh/" + "so-be-ngoan/" + {{ $hocSinh->hs_id }} + "/" + monthSelected,
                    dataType: "json",
                    success: function (response) {
                        /* Bắt đầu đổ dữ liệu ra ở đây */
                        // Hiển thị nhận xét chung
                        if(response.content == null){
                            const thongDiep = "Không có dữ liệu";
                            $("#nhanXetChung").text(thongDiep);
                            $("#hoaBeNgoan").text(thongDiep);
                            $("#chieuCao").text(thongDiep);
                            $("#canNang").text(thongDiep);
                            $("#sucKhoe").text(thongDiep);
                            let btnNhanXet = '<a href="#" class="btn btn-md btn-primary" id="btnNhanXet" data-toggle="modal" data-target="#exampleModal">Viết nhận xét</a>';
                            $("#vietNhanXet").html(btnNhanXet);
                        }
                        console.log("say hi");


                        //Ẩn button nhận xét
                        $("#btnNhanXet").attr("style","display: none");
                        //Nhhận xét chung
                        $("#nhanXetChung").text(response.sbn_nhanxetchung);
                        var imgFlower = '<img src="{{ asset('') }}admin-he-thong/images/hoa-be-ngoan.png" alt="Hoa bé ngoan" width="20%" title="Bông ">';
                        //Hiển thị bông hoa bé ngoan
                        $("#hoaBeNgoan").empty();
                        for (let index = 1; index <= response.sbn_hoctap; index++) {
                            $("#hoaBeNgoan").append(imgFlower);
                        }
                        //Hiển thị cái tháng ở dưới chữ Sổ bé ngoan
                        $("#thangHienThi").text(monthSelected);
                        //Hiển thị sức khỏe
                        $("#chieuCao").text(response.sbn_chieucao);
                        $("#canNang").text(response.sbn_cannang);
                        $("#sucKhoe").text(response.sbn_suckhoe);

                        //test dữ liệu hiển thị ra ở console
                        console.log(response);
                    },
                    error: function(e) {
                        console.log("Đang lỗi nha");
                    }
                });
            });

        //    var monthSelected = $( "#selectMonth" ).val();
        //    console.log(monthSelected);
        });
    </script>
@endpush
@endsection
