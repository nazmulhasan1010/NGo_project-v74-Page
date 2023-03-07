<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AASCO') }} | @yield('title')</title>
    {{--    fav icon --}}
    <link rel="icon" href="{{asset('storage/'. getLogo('fav')[0]->image)}}">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2e7d7272e8.js" crossorigin="anonymous"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/product/css/plugins/animate.main.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/product/css/main.css')}}" />
    <link href="{{ asset('assets/frontend/scss/main.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/frontend/scss/responsive.css') }}" rel="stylesheet">
    <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">
    @stack('vendor-css')
    @stack('onPage-css')
    @if(App::isLocale('bn'))
        <style>
            body {
                font-family: 'SiyamRupali', Arial, sans-serif !important;
            }
        </style>
    @endif
</head>
<body>
@php
    if (session()->has('language')) {
        $lanCode = session()->get('language');
        App::setLocale($lanCode);
    }
@endphp
@include('layouts.partials.frontend.product.header')
@yield('content')
@include('layouts.partials.frontend.product.footer')
{{--javascript--}}

<script src="{{asset('assets/frontend/javascript/jquery-3.6.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">

</script>
{{--<script src="{{asset('assets/frontend/javascript/axios.min.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Vendor JS-->
<script src="{{asset('assets/frontend/product/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('assets/frontend/product/js/main.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/shop.js')}}"></script>

@stack('onPage-js')
</body>
</html>
