@extends('layouts.frontend')
@section('title','Stories')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
            if (session()->has('language')) {
                $lanCode = session()->get('language');
                App::setLocale($lanCode);
            }
            $start = 0;
            $pages = 5;
            $clickPage = 0;
            $stories = success($start, $pages, 'all');
            $item = count($stories);
            $page = ceil($item/5);
            if (isset($_GET['page'])){
                $clickPage = $_GET['page'];
                $start = ($clickPage-1)*$pages;
            }
            $stories = success($start, $pages, 'spe');
    @endphp

    <div class="project_summary bg-dark-cu content-100 success">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 border-bottom-">
            <div class="col-md-8 successes">
                @foreach($stories as $stories_)
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
                            @php
                                if (strlen($des)>500){
                                   $description = substr($des,0,500).'...';
                                }else{
                                    $description = $des ;
                                }
                            @endphp
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($stories_->updated_at)).'  '.substr(date("F", strtotime($stories_->updated_at)),0,3).'  '.date("Y", strtotime($stories_->updated_at)) }}</span>
                            </div>
                            <h2>{{App::isLocale('bn')? $stories_->title_bn:$stories_->title}}</h2>
                            <p>{!! $description !!}</p>
                            <p>{{$stories_->address}}</p>
                            <a href="{{url('story/'.$stories_->id)}}">
                                <button type="button" class="more-button ">
                                    {{__('front.readMore')}}
                                </button>
                            </a>
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
        @include('frontend.pages.component.pagination')
    </div>



@endsection
