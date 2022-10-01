@extends('layouts.frontend')
@section('title','Notice')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-white-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 event-notices event-show border-bottom-">

            @if($notice)
                <div class="col-md-12 sub-container event-notice ">
                    <div class="heading">
                        <span class="heading-1">Notice</span>
                    </div>
                    @foreach($notice as $notices)
                        @if($notices->status===1)
                            <div class="row notice notice-show ">
                                <div class="col-md-12 notices">
                                    <div class="date">
                                        {{date('d',strtotime($notices->dateAt)).' '.substr(date('F',strtotime($notices->dateAt)),0,3).' '.date('Y',strtotime($notices->dateAt))}}
                                    </div>
                                </div>
                            </div>
                            <div class="row notice notice-show">
                                <a href="{{url('notice/'.$notices->id)}}" class="col-md-10 notices">
                                    <h3>{{$notices->title}}</h3>
                                    <p>{{$notices->description}}</p>
                                </a>
                            </div>
                            @php
                                $file = explode('.',$notices->attachment);
                                $ext = $file[count($file)-1];

                            @endphp
                            @if($ext === 'pdf')
                                <object data="{{asset('storage/notice/'.$notices->attachment)}}" type="application/pdf"
                                        internalinstanceid="9" title=""
                                        style="
                                            width: 100%;
                                            height: 100vh;">
                                </object>

                            @else
                                <a href="{{asset('storage/notice/'.$notices->attachment)}}">
                                    <img src="{{asset('storage/notice/'.$notices->attachment)}}" alt="notice"
                                         width="100%">
                                </a>

                            @endif
                            <a href="{{url('download/notice/'.$notices->attachment)}}" class="p-4">
                                <button type="button" class="more-button ">
                                    Download
                                </button>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

@endsection

