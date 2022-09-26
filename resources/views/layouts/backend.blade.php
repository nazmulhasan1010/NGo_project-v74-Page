<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="AASCO - Web"/>
    <meta property="og:title" content="AASCO - Web"/>
    <meta property="og:description" content="AASCO - Web"/>
    <meta property="og:image" content=""/>
    <meta name="format-detection" content="telephone=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AASCO') }} | @yield('title')</title>

    {{--    fav icon --}}
    <link rel="icon" href="{{ asset('assets/frontend/img-icon/pksf.png') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!--    font awesome -->
    <script src="https://kit.fontawesome.com/2e7d7272e8.js" crossorigin="anonymous"></script>

    {{--    datepicker--}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery-ui.css')}}" type="text/css"/>
    <!-- laravel-toastr css -->
    <link href="{{ asset('assets/backend/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- sweetalert2 css -->
    <link href="{{ asset('assets/backend/css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{ asset('assets/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}"
          rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/custom.css')}}" rel="stylesheet">
    <style>
        .req {
            color: red;
            font-weight: 700;
        }
        @media screen and (max-width: 1025px) {
            .nav-header .brand-logo{
                display: none;
            }
        }
    </style>
    @stack('vendor-css')
    @stack('onpage-css')
</head>
<body>
@include('layouts.partials.backend.preloader')
<div id="main-wrapper">

    @include('layouts.partials.backend.header')
    @include('layouts.partials.backend.left-sidebar')
    @yield('content')

    @include('layouts.partials.backend.footer')
</div>

<script src="{{asset('assets/plugin/ckeditor/ckeditor.js')}}"></script>
<!-- Required vendors -->
<script src="{{ asset('assets/backend/vendor/global/global.min.js')}}"></script>
<script src="{{ asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('assets/backend/js/jquery-ui.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom.min.js')}}"></script>
<script src="{{ asset('assets/backend/js/deznav-init.js')}}"></script>
<script src="{{ asset('assets/backend/js/demo.js')}}"></script>

<script src="{{ asset('assets/backend/js/toastr.min.js')}}"></script>
<!-- sweetalert2 css -->
<script src="{{ asset('assets/backend/js/sweetalert2.min.js')}}"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error', {
        closeButton: true,
        progressBar: true,
    });
    @endforeach
    @endif

    //
    // Delete Item
    function deleteItem(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-success',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@stack('vendor-js')
@stack('onpage-js')
</body>
</html>
