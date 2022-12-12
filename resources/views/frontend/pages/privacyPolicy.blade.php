@extends('layouts.frontend')
@section('title','Privacy Policy')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $privacy = getPrivacy();
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    <div class="project_summary bg-white-cu content-100">
        <div class="heading">
            <span class="heading-1">{{__('front.privacyPolicy1')}}</span>
            <span class="heading-2">{{__('front.privacyPolicy2')}}</span>
        </div>
        <div class="row content-80 project-summary-more terms-policy">
            @foreach($privacy as $privacies)
                @if($privacies->status===1)
                    {!! App::isLocale('bn')?$privacies->privacy_bn: $privacies->privacy !!}
                @endif
            @endforeach
        </div>
    </div>

@endsection
