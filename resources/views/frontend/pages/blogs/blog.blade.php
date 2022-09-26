@extends('layouts.frontend')
@section('title','Blog')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-dark-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 success border-bottom-">
            <div class="col-md-8 successes">
                @foreach($blog as $blog_)
                    @if($blog_->status===1)
                        <img src="{{asset('storage/'.$blog_->image)}}" alt="">
                        <div class="info-field">
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($blog_->updated_at)).'  '.substr(date("F", strtotime($blog_->updated_at)),0,3).'  '.date("Y", strtotime($blog_->updated_at)) }}</span>
                            </div>
                            <h2>{{$blog_->title}}</h2>
                            <p>{{$blog_->description}}</p>
                            <p>{{$blog_->address}}</p>
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
