<div class="header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                    <div class="row">
                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="educate-icon educate-nav"></i>
                                </button>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                            <h2 style="padding-top: 15px; color: white;">Hệ thống quản lý
                                @if (Auth::guard('giaovien')->check())
                                    {{ Auth::guard('giaovien')->user()->load('nhaTruong')->nhatruong->nt_tentruong }}
                                @endif

                                @if (Auth::guard('nhatruong')->check())
                                    {{ Auth::guard('nhatruong')->user()->nt_tentruong }}
                                @endif
                                @if (Auth::guard('phuhuynh')->check())
                                    {{ Auth::guard('phuhuynh')->user()->load('nhaTruong')->nhatruong->nt_tentruong }}
                                @endif
                            </h2>
                            @if (Auth::guard('giaovien')->check())
                                <p style="color: white;">
                                    <span><b>Tên giáo viên:</b></span> {{ Auth::guard('giaovien')->user()->gv_ten }}
                                </p>
                            @endif
                            @if (Auth::guard('phuhuynh')->check())
                                <p style="color: white;">
                                    <span>Xin chào, </span><span><b>{{ Auth::guard('phuhuynh')->user()->ph_hoten }}</b></span>
                                </p>
                            @endif
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <img src="{{ asset('template') }}/img/product/pro4.jpg" alt="" />
                                                <span class="admin-name">
                                                    @if (Auth::guard('giaovien')->check())
                                                        {{ Auth::guard('giaovien')->user()->username }}
                                                    @endif
                                                    @if (Auth::guard('nhatruong')->check())
                                                        {{ Auth::guard('nhatruong')->user()->username }}
                                                    @endif
                                                    @if (Auth::guard('phuhuynh')->check())
                                                        {{ Auth::guard('phuhuynh')->user()->username }}
                                                    @endif
                                                </span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>Thông tin cá nhân</a></li>
                                            <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Tùy chỉnh tài khoản</a></li>
                                            @if (Auth::guard('nhatruong')->check())
                                                <li><a href="{{ route('dang-xuat') }}"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a></li>
                                            @endif
                                            @if (Auth::guard('giaovien')->check())
                                                <li><a href="{{ route('giao-vien.dang-xuat') }}"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a></li>
                                            @endif
                                            @if (Auth::guard('phuhuynh')->check())
                                                <li><a href="{{ route('phu-huynh.dang-xuat') }}"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a></li>
                                            @endif
                                        </ul>
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
