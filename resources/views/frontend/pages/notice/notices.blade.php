@extends('layouts.frontend')
@section('title','Notices')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <!-- event & notice -->
    <div class="project_summary bg-white-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 event-notices event-show border-bottom-">
            @php
                $start = 0;
                $pages = 5;
                $clickPage = 0;
                $notice = getNotices($start, $pages, 'all');
                $item = count($notice);
                $page = ceil($item/5);
                if (isset($_GET['page'])){
                    $clickPage = $_GET['page'];
                    $start = ($clickPage-1)*$pages;
                }
                $notice = getNotices($start, $pages, 'spe');
                if (session()->has('language')) {
                $lanCode = session()->get('language');
                App::setLocale($lanCode);
            }
            @endphp
            @if($notice)
                <div class="col-md-6 sub-container event-notice ">
                    <div class="heading">
                        <span class="heading-1">{{__('front.notice')}}</span>
                    </div>
                    @foreach($notice as $notices)
                        @if($notices->status===1)
                            @php
                                if (App::isLocale('bn')) {
                                     $title = $notices->title_bn;
                                     $description = $notices->description_bn;
                                }else{
                                     $title = $notices->title;
                                     $description = $notices->description;
                                }
                            @endphp
                            <div class="row notice">
                                <div class="col-md-2 notices">
                                    <div class="date">
                                        {{date('d',strtotime($notices->dateAt)).' '.substr(date('F',strtotime($notices->dateAt)),0,3).' '.date('Y',strtotime($notices->dateAt))}}
                                    </div>
                                </div>
                                <a href="{{url('notice/'.$notices->id)}}" class="col-md-10 notices">
                                    @php
                                        if (strlen($title)>40){
                                           $title_ = substr($title,0,39).'...';
                                        }else{
                                            $title_ = $title ;
                                        }
                                    @endphp
                                    <h3>{!! $title_ !!}</h3>
                                    @php
                                        if (strlen($description)>300){
                                           $des = substr($description,0,299).'...';
                                        }else{
                                            $des = $description ;
                                        }
                                    @endphp
                                    <p>{!! $des !!}</p>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        @include('frontend.pages.component.pagination')
    </div>

@endsection
