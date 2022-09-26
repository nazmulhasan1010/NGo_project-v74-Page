@extends('layouts.frontend')
@section('title','Terms and Conditions')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $terms = getTerms();
    @endphp
    <div class="project_summary bg-white-cu content-100">
        <div class="heading">
            <span class="heading-1">Terms &</span>
            <span class="heading-2">Conditions</span>
        </div>
        <div class="row content-80 project-summary-more terms-policy">
            @foreach($terms as $term)
                @if($term->status===1)
                    {!! $term->terms  !!}
                @endif
            @endforeach
        </div>
    </div>

@endsection
