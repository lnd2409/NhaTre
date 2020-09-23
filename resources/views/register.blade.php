<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kid Care | Đăng ký</title>
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
    <!-- modernizr JS
        ============================================ -->
    <script src="{{ asset('template') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Đăng ký thành viên</h3>
				<p>Cầu nối giữa nhà trường và phụ huynh</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('xu-ly-dang-ky') }}" method="POST">
                            @csrf
                            <div class="row" id="form-register">
                                @if (Session::has('alert'))
                                    <div class="alert alert-danger alert-mg-b">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        <strong>Lỗi !</strong> {{ Session::get('alert') }}
                                    </div>
                                @endif
                                <div class="form-group col-lg-12">
                                    <label>Tên trường</label>
                                    <input class="form-control" name="tenTruong" type="text" placeholder="Nhập tên trường . . ." required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Tên đăng nhập</label>
                                    <input class="form-control" name="username" type="text" placeholder="Nhập tên đăng nhập" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" placeholder="*******" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="repassword" class="form-control" placeholder="*******" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Địa chỉ email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Nhập địa chỉ email . . ." required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="sdt" type="number" placeholder="Nhập số điện thoại . . ." required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" name="diaChi" type="text" placeholder="Nhập địa chỉ trường . . ." required>
                                </div>
                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks"> Tôi đồng ý với các <a href="#" style="color: red; background-color: unset;">điều khoản</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" id="register" type="submit">Đăng ký</button>
                                <button class="btn btn-default" type="button" onclick="window.location.href='{{ route('dang-nhap') }}'">Quay về</button>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
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
