<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kid Care | Thông tin về trường</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template') }}/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/responsive.css">
    <style>
        .centered {
            margin: 0 auto;
            float: none;
        }
    </style>
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('template') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="container-fluid">

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 centered">
                        <div class="product-payment-inner-st">
                            <div class="row text-center" style="margin-top: 20px;">
                                <h1>Nhập thông tin trường</h1>
                            </div>
                            <div class="row text-center">
                                <p>Tên trường: {{ $nhaTruong->nt_tentruong }}</p>
                                <p>Địa chỉ: {{ $nhaTruong->nt_diachi }}</p>
                                <p>SĐT: {{ $nhaTruong->nt_sodienthoai }}</p>
                                <p>Email: {{ $nhaTruong->nt_email }}</p>
                            </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="review-content-section">
                                                <form id="add-department" class="add-department" action="{{ route('xu-ly-thong-tin') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centered">
                                                            <div class="form-group">
                                                                <label>Năm học</label>
                                                                <select class="form-control" id="exampleFormControlSelect1" name="namHoc">
                                                                    <option value="2020-2021">2020-2021</option>
                                                                    <option value="2021-2022">2021-2022</option>
                                                                    <option value="2023-2024">2023-2024</option>
                                                                    <option value="2024-2025">2024-2025</option>
                                                                    <option value="2025-2026">2025-2026</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centered">
                                                            <div class="form-group">
                                                                <label>Học kỳ</label>
                                                                <select class="form-control" id="exampleFormControlSelect1" name="hocKy">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="Hè">Hè</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centered">
                                                            <div class="form-group">
                                                                <label for="">Lớp mầm</label>
                                                                <input name="lopMam" type="number" class="form-control" placeholder="Nhập số lượng lớp . . .">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centered">
                                                            <div class="form-group">
                                                                <label for="">Lớp chồi</label>
                                                                <input name="lopChoi" type="number" class="form-control" placeholder="Nhập số lượng lớp . . .">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centered">
                                                            <div class="form-group">
                                                                <label for="">Lớp lá</label>
                                                                <input name="lopLa" type="number" class="form-control" placeholder="Nhập số lượng lớp . . .">
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
    <!-- jquery
		============================================ -->
    <script src="{{ asset('template') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('template') }}/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('template') }}/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('template') }}/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('template') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('template') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('template') }}/js/metisMenu/metisMenu.min.js"></script>
    <script src="{{ asset('template') }}/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{ asset('template') }}/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{ asset('template') }}/js/icheck/icheck.min.js"></script>
    <script src="{{ asset('template') }}/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('template') }}/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('template') }}/js/main.js"></script>
</body>

</html>

