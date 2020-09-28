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
                            <span class="mini-click-non" >Trang thống kê</span>
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
                    {{-- Học sinh --}}
                    <li class="">
                        <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Học sinh</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            <li><a title="All Students" href="{{ route('danh-sach-hoc-sinh') }}"><span class="mini-sub-pro">Danh sách học sinh</span></a></li>
                            <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Thêm học sinh</span></a></li>
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
                    {{-- Môn học --}}
                    <li>
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Môn học</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false">
                            <li><a title="All Courses" href="all-courses.html"><span class="mini-sub-pro">Danh sách môn học</span></a></li>
                            <li><a title="Add Courses" href="add-course.html"><span class="mini-sub-pro">Thêm môn học</span></a></li>
                        </ul>
                    </li>
                    {{-- Thời khóa biểu --}}
                    <li>
                        <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Thời khóa biểu</span></a>
                    </li>
                    {{-- Thực đơn --}}
                    <li class="">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Thực đơn</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="#"><span class="mini-sub-pro">Cập nhật thực đơn</span></a></li>
                            <li><a href="#"><span class="mini-sub-pro">Quản lý món ăn</span></a></li>
                        </ul>
                    </li>
                    {{-- Phụ huynh --}}
                    <li>
                        <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Phụ huynh</span></a>
                        <ul class="submenu-angle collapse" aria-expanded="false">
                            <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">Danh sách phụ huynh</span></a></li>
                            <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Thêm phụ huynh</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->
