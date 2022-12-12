@extends('layouts.frontend')
@section('title','Events')
@section('content')
    @php
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    @include('layouts.partials.frontend.pageTitle')
    <!-- event & notice -->
    <div class="project_summary bg-white-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 event-notices event-show">
            @if($event)
                <div class="col-md-12 sub-container event-notice">
                    <div class="heading">
                        <span class="heading-1">{{__('front.upcoming')}}</span>
                        <span class="heading-2">{{__('front.events')}}</span>
                    </div>
                    @foreach($event as $events)
                        @if($events->status===1)
                            <div class="row event">
                                <div class="col-md-4 events">
                                    <img src="{{asset('storage/' .$events->image)}}" alt="">
                                </div>
                                <div class="col-md-8 events">
                                    <h4>{{App::isLocale('bn')?$events->title_bn:$events->title}}</h4>
                                    <div class="event-date-place">
                                        <span>{{date("d", strtotime($events->start)).' '.substr(date("F", strtotime($events->start)),0,3).' '.date("Y", strtotime($events->start)) .' - ' .date("d", strtotime($events->end)).' '.substr(date("F", strtotime($events->end)),0,3).' ' .date("Y", strtotime($events->end))}}</span>
                                        <span>{{$events->place}}</span>
                                    </div>
                                    <p>{{App::isLocale('bn')?$events->description_bn:$events->description}}</p>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @push('onPage-js')


    @endpush
@endsection
