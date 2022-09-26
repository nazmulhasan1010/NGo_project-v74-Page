@extends('layouts.frontend')
@section('title','Privacy Policy')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $privacy = getPrivacy();
    @endphp
    <div class="project_summary bg-white-cu content-100">
        <div class="heading">
            <span class="heading-1">Privacy</span>
            <span class="heading-2">Policy</span>
        </div>
        <div class="row content-80 project-summary-more terms-policy">
            @foreach($privacy as $privacies)
                @if($privacies->status===1)
                    {!! $privacies->privacy  !!}
                @endif
            @endforeach
        </div>
    </div>

@endsection
