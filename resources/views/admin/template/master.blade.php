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
