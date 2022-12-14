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

        if (session()->has('language')) {
                $lanCode = session()->get('language');
                App::setLocale($lanCode);
            }
    @endphp

    <div class="project_summary bg-dark-cu content-100 success">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 border-bottom-">
            <div class="col-md-8 successes">
                @foreach($blogs as $blog)
                    @if($blog->status===1)
                        @php
                            if (App::isLocale('bn')) {
                                 $title = $blog->title_bn;
                                 $description = $blog->description_bn;
                            }else{
                                 $title = $blog->title;
                                 $description = $blog->description;
                            }
                        @endphp
                        <img src="{{asset('storage/'.$blog->image)}}" alt="">
                        <div class="info-field mt-3">
                            @php
                                if (strlen($description)>500){
                                   $des = substr($description,0,500).'...';
                                }else{
                                    $des = $description ;
                                }
                            @endphp
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($blog->updated_at)).' '.substr(date("F", strtotime($blog->updated_at)),0,3).'  '.date("Y", strtotime($blog->updated_at)) }}</span>
                            </div>
                            <h2>{!! $title !!}</h2>
                            <p>{!! $des !!}</p>
                            <p>{{$blog->address}}</p>
                            <a href="{{url('blog/'.$blog->id)}}">
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
