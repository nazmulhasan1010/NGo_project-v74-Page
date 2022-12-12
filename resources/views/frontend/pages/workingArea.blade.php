@extends('layouts.frontend')
@section('title','Working Area')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
            $area = getWorkingArea();
    @endphp

    <div class="project_summary bg-dark-cu content-100">
        <div class="row content-80 ">
            <div class="col-md-12 working-area working-area-12">
                <img src="{{asset('storage/' . $area->image)}}" alt="">
            </div>
            <div class="col-md-12 working-area working-area-12">
                <h2>{{App::isLocale('bn')?$area->area_bn:$area->area}}</h2>
                <p>{{App::isLocale('bn')?$area->description_bn:$area->description}}</p>
            </div>
        </div>
    </div>


@endsection
