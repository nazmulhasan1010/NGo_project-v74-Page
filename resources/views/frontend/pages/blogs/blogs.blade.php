@extends('layouts.frontend')
@section('title','Blog')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $start = 0;
        $pages = 5;
        $clickPage = 0;
        $blogs = getBlogs($start, $pages, 'all');
        $item = count($blogs);
        $page = ceil($item/5);
        if (isset($_GET['page'])){
            $clickPage = $_GET['page'];
            $start = ($clickPage-1)*$pages;
        }
        $blogs = getBlogs($start, $pages, 'spe');
    @endphp

    <div class="project_summary bg-dark-cu content-100 success">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 border-bottom-">
            <div class="col-md-8 successes">
                @foreach($blogs as $blog)
                    @if($blog->status===1)
                        <img src="{{asset('storage/'.$blog->image)}}" alt="">
                        <div class="info-field">
                            @php
                                if (strlen($blog->description)>500){
                                   $description = substr($blog->description,0,500).'...';
                                }else{
                                    $description = $blog->description ;
                                }
                            @endphp
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($blog->updated_at)).' '.substr(date("F", strtotime($blog->updated_at)),0,3).'  '.date("Y", strtotime($blog->updated_at)) }}</span>
                            </div>
                            <h2>{{$blog->title}}</h2>
                            <p>{{$description}}</p>
                            <p>{{$blog->address}}</p>
                            <a href="{{url('blog/'.$blog->id)}}">
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
