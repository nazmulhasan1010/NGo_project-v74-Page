@extends('layouts.frontend')
@section('title','Terms and Conditions')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $terms = getTerms();
         if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    <div class="project_summary bg-white-cu content-100">
        <div class="heading">
            <span class="heading-1">{{__('front.terms1')}}</span>
            <span class="heading-2">{{__('front.terms2')}}</span>
        </div>
        <div class="row content-80 project-summary-more terms-policy">
            @foreach($terms as $term)
                @if($term->status===1)
                    {!! App::isLocale('bn')? $term->terms_bn:$term->terms !!}
                @endif
            @endforeach
        </div>
    </div>

@endsection
