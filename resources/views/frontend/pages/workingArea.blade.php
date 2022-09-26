@extends('layouts.frontend')
@section('title','Working Area')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $area = getWorkingArea();
    @endphp

    <div class="project_summary bg-dark-cu content-100">
        <div class="row content-80 ">
            <div class="col-md-12 working-area working-area-12">
                <img src="{{asset('storage/' . $area->image)}}" alt="">
            </div>
            <div class="col-md-12 working-area working-area-12">
                <h2>{{$area->area}}</h2>
                <p>{{$area->description}}</p>
            </div>
        </div>
    </div>


@endsection
