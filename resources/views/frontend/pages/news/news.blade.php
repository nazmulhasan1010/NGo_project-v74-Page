@extends('layouts.frontend')
@section('title','News')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $start = 0;
        $pages = 5;
        $clickPage = 0;
        $newses = getNews($start, $pages, 'all');
        $item = count($newses);
        $page = ceil($item/5);
        if (isset($_GET['page'])){
            $clickPage = $_GET['page'];
            $start = ($clickPage-1)*$pages;
        }
        $newses = getNews($start, $pages, 'spe');
    @endphp
    <div class="project_summary bg-white-cu content-100 success ">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 border-bottom- ">
            <div class="col-md-8 successes">
                @foreach($newses as $news)
                    @if($news->status===1)
                        <img src="{{asset('storage/'.$news->image)}}" alt="">
                        <div class="info-field">
                            @php
                                if (strlen($news->description)>500){
                                   $description = substr($news->description,0,500).'...';
                                }else{
                                    $description = $news->description ;
                                }
                            @endphp
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($news->updated_at)).' '.substr(date("F", strtotime($news->updated_at)),0,3).'  '.date("Y", strtotime($news->updated_at)) }}</span>
                            </div>
                            <h2>{{$news->title}}</h2>
                            <p>{{$description}}</p>
                            <p>{{$news->address}}</p>
                            <a href="{{url('news/'.$news->id)}}">
                                <button type="button" class="more-button ">
                                    Read More
                                </button>
                            </a>
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
        @include('frontend.pages.component.pagination')

    </div>

@endsection
