@if (Auth::guard('nhatruong')->check())
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('trang-chu') }}">
                <h1 style="margin-top: 10px;"><span style="color: rgb(50, 170, 110)">KID</span>Care</h1>
            </a>
            <strong><a href="#"><img src="{{ asset('template') }}/img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li
                        @if (Request::path() == 'admin')
                            style="background-color: #006DF0;"
                        @endif
                    >
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a title="Landing Page" href="{{ route('admin') }}" aria-expanded="false" style="
                            @if (Request::path() == 'admin')
                            color: white;
                        @endif
                        ">
                            <span class="educate-icon educate-home icon-wrap" style="@if (Request::path() == 'admin') color: white; @endif"></span>
                            <span class="mini-click-non" >Trang thống kê</span>
                        </a>
                    </li>
                    {{-- Giáo viên --}}
                    {{-- giao-vien/danh-sach-giao-vien --}}
                    <li class="
                    @if (Request::path() == 'giao-vien/danh-sach-giao-vien' || Request::path() == 'giao-vien/them-giao-vien')
                        active
                    @endif
                    ">
                        <a class="has-arrow" href="all-professors.html"
                            aria-expanded=""><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Giáo viên</span></a>
                        <ul class="submenu-angle collapse"
                            aria-expanded="false">
                            <li
                                @if (Request::path() == 'giao-vien/danh-sach-giao-vien')
                                    style="background-color: #006DF0;"
                                @endif
                            >
                                <a href="{{ route('danh-sach-giao-vien') }}" style="@if (Request::path() == 'giao-vien/danh-sach-giao-vien')
                                                                                        color: white;
                                                                                    @endif">
                                    <span class="mini-sub-pro">Danh sách</span>
                                </a>
                            </li>
                            <li
                                @if (Request::path() == 'giao-vien/them-giao-vien')
                                    style="background-color: #006DF0;"
                                @endif
                            >
                                <a href="{{ route('them-giao-vien') }}" style="@if (Request::path() == 'giao-vien/them-giao-vien')
                                                                                    color: white;
                                                                                @endif">
                                    <span class="mini-sub-pro">Thêm giáo viên</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Học sinh --}}
                    <li class="">
                        <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Học sinh</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            <li><a title="All Students" href="{{ route('danh-sach-hoc-sinh') }}"><span class="mini-sub-pro">Danh sách học sinh</span></a></li>
                            <li><a title="Add Students" href="{{ route('hocsinh.them-hoc-sinh') }}"><span class="mini-sub-pro">Thêm học sinh</span></a></li>
                        </ul>
                    </li>
                    {{-- Lớp học --}}
                    <li class="">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Khối học</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            @foreach ($khoiHoc as $item)
                                <li><a href="{{ route('danh-sach-lop-hoc', ['idKhoi'=>$item->kh_id]) }}"><span class="mini-sub-pro">{{ $item->kh_tenkhoi }}</span></a></li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- Môn học --}}
                    <li>
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Môn học</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false">
                            <li><a title="All Courses" href="{{ route('danh-sach-mon-hoc') }}"><span class="mini-sub-pro">Danh sách môn học</span></a></li>
                            <li><a title="Add Courses" href="add-course.html"><span class="mini-sub-pro">Thêm môn học</span></a></li>
                        </ul>
                    </li>
                    {{-- Thực đơn --}}
                    <li class="">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Thực đơn</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="{{ route('thuc-don') }}"><span class="mini-sub-pro">Cập nhật thực đơn</span></a></li>
                            <li><a href="{{ route('mon-an') }}"><span class="mini-sub-pro">Quản lý món ăn</span></a></li>
                        </ul>
                    </li>
                    {{-- Phụ huynh --}}
                    <li>
                        <a class="has-arrow" href="{{ route('danh-sach-phu-huynh') }}" aria-expanded="false">
                            <span class="educate-icon educate-professor"></span>
                            <span class="mini-click-non">Danh sách phụ huynh</span>
                        </a>
                    </li>
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a href="#" aria-expanded="false">
                            <span class="educate-icon educate-interface"></span>
                            <span class="mini-click-non" >Góp ý</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
@endif
@if (Auth::guard('giaovien')->check())
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('trang-chu') }}">
                <h1 style="margin-top: 10px;"><span style="color: rgb(50, 170, 110)">KID</span>Care</h1>
            </a>
            <strong><a href="#"><img src="{{ asset('template') }}/img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a title="Landing Page" href="{{ route('giao-vien.trang-quan-ly') }}" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non" >Trang thống kê</span>
                        </a>
                    </li>
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a title="Landing Page" href="{{ route('giao-vien.danh-sach-hoc-sinh') }}" aria-expanded="false">
                            <span class="educate-icon educate-student icon-wrap"></span>
                            <span class="mini-click-non" >Sổ bé ngoan</span>
                        </a>
                    </li>
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a title="Landing Page" href="{{ route('hoat-dong.danh-sach') }}" aria-expanded="false">
                            <span class="educate-icon educate-library icon-wrap"></span>
                            <span class="mini-click-non" >Quản lý lịch hoạt động</span>
                        </a>
                    </li>
                    <li >
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a
                            @if (Request::path() == 'giao-vien/thong-bao/thong-bao-da-gui' || Request::path() == 'giao-vien/thong-bao')
                            style="background-color: #006DF0; color: white;"
                            @endif title="Landing Page" href="{{ route('giao-vien.thong-bao') }}" aria-expanded="false">
                            <span class="educate-icon educate-interface icon-wrap"></span>
                            <span class="mini-click-non" >Thông báo</span>
                        </a>
                    </li>
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a href="{{ route('giao-vien.don-xin-phep') }}" aria-expanded="false">
                            <span class="educate-icon educate-interface"></span>
                            <?php
                                $donXinPhep = DB::table('donxinphep')
                                ->join('hocsinh','hocsinh.hs_id','donxinphep.hs_id')
                                ->join('lophoc','lophoc.lh_id','hocsinh.lh_id')
                                ->where('lophoc.nt_id',Auth::guard('nhatruong')->id())
                                ->where('dxp_trangthai',0)->get();
                            ?>
                            <span class="mini-click-non" >Đơn xin phép ({{ $donXinPhep }})</span>
                        </a>
                    </li>
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a href="{{ route('giao-vien.diem-danh') }}" aria-expanded="false">
                            <span class="educate-icon educate-interface"></span>

                            <span class="mini-click-non" >Điểm danh</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
@endif
