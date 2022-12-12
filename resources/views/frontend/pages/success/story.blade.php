@extends('layouts.frontend')
@section('title','Story')
@section('content')
    @php
        if (session()->has('language')) {
               $lanCode = session()->get('language');
               App::setLocale($lanCode);
           }
    @endphp
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-dark-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 success">
            <div class="col-md-8 successes">
                @foreach($story as $stories_)
                    @if($stories_->status===1)
                        @php
                            if (App::isLocale('bn')) {
                                  $des = $stories_->description_bn;
                             }else{
                                 $des = $stories_->description;
                             }
                        @endphp
                        <img src="{{asset('storage/'.$stories_->image)}}" alt="">
                        <div class="info-field mt-3">
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($stories_->updated_at)).'  '.substr(date("F", strtotime($stories_->updated_at)),0,3).'  '.date("Y", strtotime($stories_->updated_at)) }}</span>
                            </div>
                            <h2>{{App::isLocale('bn')? $stories_->title_bn:$stories_->title}}</h2>
                            <p>{!! $des !!}</p>
                            <p>{{$stories_->address}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 sub-container successes">
                <div class="heading">
                    <span class="heading-1">{{__('front.latestPost1')}}</span>
                    <span class="heading-2">{{__('front.latestPost2')}}</span>
                </div>
                @include('frontend.pages.component.latestPost')
            </div>
        </div>
    </div>

@endsection
