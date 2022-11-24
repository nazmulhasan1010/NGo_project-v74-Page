<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AASCO') }} | @yield('title')</title>

    {{--    fav icon --}}
    <link rel="icon" href="{{ asset('assets/frontend/img-icon/pksf.png') }}">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2e7d7272e8.js" crossorigin="anonymous"></script>
    <!-- Template CSS -->
    <link href="{{asset('assets/backend/product/css/main.css')}}" rel="stylesheet" type="text/css" />
    @stack('vendor-css')
    @stack('onPage-css')
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
<script src="assets/js/vendors/select2.min.js"></script>
<script src="assets/js/vendors/perfect-scrollbar.js"></script>
<script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
<script src="assets/js/vendors/chart.js"></script>
<!-- Main Script -->
<script src="assets/js/main.js?v=1.1" type="text/javascript"></script>
<script src="assets/js/custom-chart.js" type="text/javascript"></script>
<!-- Template  JS -->
<script src="{{asset('assets/frontend/product/js/main.js')}}"></script>
<script src="{{asset('assets/frontend/product/js/shop.js')}}"></script>

@stack('onPage-js')
</body>
</html>
