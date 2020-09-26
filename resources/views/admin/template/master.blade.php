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
                            $('#tenGiaoVien').val(response.gv_ten);
                            $('#diaChi').val(response.gv_diachi);
                            $('#ngaySinh').val(response.gv_ngaysinh);
                            $('#sdt').val(response.gv_sdt);
                            console.log(response);
                        }
                    });
                });
            });
        </script>
    @endif
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
</body>

</html>
