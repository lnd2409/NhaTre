<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="#"><img class="main-logo" src="{{ asset('template') }}/img/logo/logo.png" alt="" /></a>
            <strong><a href="#"><img src="{{ asset('template') }}/img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        {{-- style="color: rgb(32, 31, 31) !important; background-color: ghostwhite;" --}}
                        <a title="Landing Page" href="{{ route('admin') }}" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non" >Trang điều khiển</span>
                        </a>
                    </li>
                    {{-- Giáo viên --}}
                    <li class="">
                        <a class="has-arrow" href="all-professors.html"
                            aria-expanded=""><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Giáo viên</span></a>
                        <ul class="submenu-angle collapse"
                            aria-expanded="false">
                            <li><a href="{{ route('danh-sach-giao-vien') }}"><span class="mini-sub-pro">Danh sách</span></a></li>
                            <li><a href="{{ route('them-giao-vien') }}"><span class="mini-sub-pro">Thêm giáo viên</span></a></li>
                        </ul>
                    </li>
                    {{-- Lớp học --}}
                    <li class="">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Lớp học</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            @foreach ($khoiHoc as $item)
                                <li><a href="{{ route('danh-sach-lop-hoc', ['idKhoi'=>$item->kh_id]) }}"><span class="mini-sub-pro">Lớp {{ $item->kh_tenkhoi }}</span></a></li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- Thực đơn --}}
                    <li class="">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Thực đơn</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="#"><span class="mini-sub-pro">Cập nhật thực đơn</span></a></li>
                            <li><a href="#"><span class="mini-sub-pro">Quản lý món ăn</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->
