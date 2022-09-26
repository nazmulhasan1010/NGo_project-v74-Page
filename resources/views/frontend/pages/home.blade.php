@extends('layouts.frontend')
@section('title','Home')
@section('content')
    @php
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    @include('frontend.components.slider')
    @include('frontend.components.projectSummary')
    @include('frontend.components.workingArea')
    @include('frontend.components.projectActivities')
    @include('frontend.components.projectObjective')
    @include('frontend.components.event_Notice')
    @include('frontend.components.enterPrises')
    @include('frontend.components.galleries')
    @include('frontend.components.partners')
@endsection
