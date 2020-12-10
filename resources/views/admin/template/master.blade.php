<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kid Care | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template') }}/img/favicon.ico">
    {{-- include css --}}
    <style>
        * {padding: 0; margin: 0;}
.booth {width: 400px; height: auto; margin: 20px auto; padding: 10px; background-color: #f1f1f1; border: 1px solid #e5e5e5;}
.booth a {display: block; padding: 10px; text-align: center; background-color: #428bca; margin: 10px 0; font-size: 15px; color: #fff; text-decoration: none;}
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css-thoi-khoa-bieu')
    @include('admin.template.css')
</head>

<body>
    @include('admin.template.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @yield('content')

        @include('admin.template.footer')
    </div>

    @include('admin.template.js')
    {{-- Và đây là AJAX --}}
    {{-- Giáo viên --}}
    @if (Request::path() == 'giao-vien/danh-sach-giao-vien')
        <script>
            $(document).ready(function(){
                $(document).on('click','.openModal',function(){
                    var id = $(this).data('id');
                    var url = "{!! asset('') !!}";
                    console.log(url);
                    console.log(id);
                    $.ajax({
                        type: "GET",
                        url: url + "giao-vien/chi-tiet/" + id,
                        // data: "data",
                        dataType: "json",
                        success: function (response) {
                            $('#idGiaoVien').val(response.gv_id);
                            $('#tenGiaoVien').val(response.gv_ten);
                            $('#diaChi').val(response.gv_diachi);
                            $('#ngaySinh').val(response.gv_ngaysinh);
                            $('#sdt').val(response.gv_sdt);
                            if(response.gv_gioitinh == 0){
                                $('#women').attr("selected","selected");
                            }else{
                                $('#men').attr("selected","selected");
                            }
                            $('#gioiTinh').val(response.gv_gioitinh);
                            console.log(response);
                        }
                    });
                });
            });
        </script>
    @endif
    {{-- Lớp học --}}
    @if (Request::path() == 'lop-hoc/1' || Request::path() == 'lop-hoc/2' || Request::path() == 'lop-hoc/3')
        <script>
            $(document).ready(function(){
                $(document).on('click','.openModal',function(){
                    var id = $(this).data('id');
                    var url = "{!! asset('') !!}";
                    // var class = $(this).data('id-1');
                    let tenLop = $('#lopHoc').data('lop')
                    console.log(url);
                    console.log(id);
                    // console.log(class);
                    // console.log(data);
                    $.ajax({
                        type: "GET",
                        url: url + "giao-vien/chi-tiet/" + id,
                        // data: "data",
                        dataType: "json",
                        success: function (response) {
                            $('#tenLop').text(tenLop);
                            $('#tenGiaoVien').text(response.gv_ten);
                            $('#diaChi').text(response.gv_diachi);
                            $('#ngaySinh').text(response.gv_ngaysinh);
                            $('#sdt').text(response.gv_sdt);
                            console.log(response);
                        }
                    });
                });
            });
        </script>
    @endif
    {{-- học sinh --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    @stack('danh-sach-hoc-sinh')
    <script>
        $(function () {
            var url      = window.location.href;
            var id = url.substr(39,3);
            // console.log(id);
            var table = $('.data-table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "http://127.0.0.1:8000/lop-hoc/chi-tiet/" + id,
                    type: 'GET',
                },
                columns: [
                    {data: 'hs_id', name: 'hs_id'},
                    {data: 'hs_hoten', name: 'hs_hoten'},
                    {data: 'hs_noisinh', name: 'hs_noisinh'},
                    {data: 'hs_ngaysinh', name: 'hs_ngaysinh'},
                    // {data: 'lh_tenlop', name: 'lh_tenlop'}
                ],
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
                    "zeroRecords": "Không có dữ liệu",
                    "info": "Hiển thị _PAGE_ trên _PAGES_",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(Tìm thấy trong _MAX_ dữ liệu)",
                    "paginate": {
                        "first":      "<<",
                        "last":       ">>",
                        "next":       ">>",
                        "previous":   "<<"
                    },
                    "search": "Tìm kiếm:",
                }
            });
        });
    </script>
    @stack('thuc-don')
    @stack('select-picker')
    @stack('ajax-get-class')
    @stack('giao-vien.chart')
    @stack('so-be-ngoan')
    @stack('js-thoi-khoa-bieu')
    @stack('js-diem-danh')
</body>

</html>
