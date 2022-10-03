@extends('layouts.backend')
@section('title','Dashboard')

@push('vendor-css')

@endpush
@push('onpage-css')
    <style>
        @media screen and (max-width: 1025px) {
            .content-body .container-fluid .
        }
    </style>
@endpush
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row d-flex" style="flex-direction:column; align-items:center; justify-content:center;height: 90vh">
            @php
                $logo = getLogo('primary');
                $logoImg ='assets/frontend/img-icon/pksf.jpeg';
                if (count($logo)>0){
                    $logoImg = 'storage/'. $logo[0]->image;
                }
            @endphp
            <img src="{{asset($logoImg)}}" alt="logo" style="max-height: 55px; width: 200px" >
{{--            <h2 style="color: rgba(52, 52, 52, 0.50); font-size:3rem">Welcome come to {{config('app.name', 'AASCO') }} Admin</h2>--}}
            <p style="color: #097d3e;font-size:1.5rem">{{date('d-F-y')}}</p>
        </div>

    </div>
</div>

@endsection
@push('vendor-js')

@endpush
@push('onpage-js')

@endpush
