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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Sổ bé ngoan</h2>
            </div>
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
                                                                        <h2>Education</h2>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-b-15">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Experience</h2>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Subjects</h2>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                </ul>
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
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input name="number" type="text" class="form-control" placeholder="First Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Last Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Date of Birth">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Department">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Pincode">
                                                            </div>
                                                            <div class="file-upload-inner ts-forms">
                                                                <div class="input prepend-big-btn">
                                                                    <label class="icon-right" for="prepend-big-btn">
                                                                            <i class="fa fa-download"></i>
                                                                        </label>
                                                                    <div class="file-button">
                                                                        Browse
                                                                        <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                    </div>
                                                                    <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group sm-res-mg-15 tbpf-res-mg-15">
                                                                <input type="text" class="form-control" placeholder="Description">
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Select Gender</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                        <option>Select country</option>
                                                                        <option>India</option>
                                                                        <option>Pakistan</option>
                                                                        <option>Amerika</option>
                                                                        <option>China</option>
                                                                        <option>Dubai</option>
                                                                        <option>Nepal</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                        <option>Select state</option>
                                                                        <option>Gujarat</option>
                                                                        <option>Maharastra</option>
                                                                        <option>Rajastan</option>
                                                                        <option>Maharastra</option>
                                                                        <option>Rajastan</option>
                                                                        <option>Gujarat</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                        <option>Select city</option>
                                                                        <option>Surat</option>
                                                                        <option>Baroda</option>
                                                                        <option>Navsari</option>
                                                                        <option>Baroda</option>
                                                                        <option>Surat</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Website URL">
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Mobile no.">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress mg-t-15">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
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
@endsection
