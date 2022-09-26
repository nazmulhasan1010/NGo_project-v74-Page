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

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"/>

    <!-- Styles -->
    {{--    <link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/frontend/scss/main.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/frontend/scss/responsive.css') }}" rel="stylesheet">
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
@include('layouts.partials.frontend.header')
@yield('content')
@include('layouts.partials.frontend.footer')
{{--javascript--}}

<script src="{{asset('assets/frontend/javascript/jquery-3.6.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">

</script>
{{--<script src="{{asset('assets/frontend/javascript/axios.min.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('assets/frontend/javascript/app.js')}}"></script>

@stack('onPage-js')
</body>
</html>
