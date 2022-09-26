@extends('layouts.frontend')
@section('title','News')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-dark-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 success border-bottom-">
            <div class="col-md-8 successes">
                @foreach($news as $news_)
                    @if($news_->status===1)
                        <img src="{{asset('storage/'.$news_->image)}}" alt="">
                        <div class="info-field">
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($news_->updated_at)).'  '.substr(date("F", strtotime($news_->updated_at)),0,3).'  '.date("Y", strtotime($news_->updated_at)) }}</span>
                            </div>
                            <h2>{{$news_->title}}</h2>
                            <p>{{$news_->description}}</p>
                            <p>{{$news_->address}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 sub-container successes">
                <div class="heading">
                    <span class="heading-1">Latest</span>
                    <span class="heading-2">Post</span>
                </div>
                @include('frontend.pages.component.latestPost')
            </div>
        </div>
    </div>

@endsection
