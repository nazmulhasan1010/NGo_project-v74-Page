<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Laravel Project Starter" />
	<meta property="og:title" content="Laravel Project Starter" />
	<meta property="og:description" content="Laravel Project Starter" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
    <title>{{ config('app.name', 'AASCO') }} | @yield('title')</title>
    <!-- Favicon icon -->

    {{--    fav icon --}}
    <link rel="icon" href="{{ asset('assets/frontend/img-icon/pksf.png') }}">


    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/backend/images/favicon.png')}}">
	<link href="{{ asset('assets/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}} " rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css')}}" rel="stylesheet">
    @stack('vendor-css')
    @stack('onpage-css')
</head>

<body class="vh-100">

    @yield('content')

    <script src="{{ asset('assets/backend/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    @stack('vendor-js')
    @stack('onpage-js')
</body>
</html>
