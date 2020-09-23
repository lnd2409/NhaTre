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
</body>

</html>
