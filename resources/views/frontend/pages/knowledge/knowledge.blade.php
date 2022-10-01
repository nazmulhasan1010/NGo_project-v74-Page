@extends('layouts.frontend')
@section('title','Knowledge')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-white-cu content-100">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 event-notices event-show border-bottom-">

            @if($knowledge)
                <div class="col-md-12 sub-container event-notice ">
                    @foreach($knowledge as $knowledgeData)
                        @if($knowledgeData->status===1)
                            <div class="row notice notice-show ">
                                <div class="col-md-12 notices">
                                    <div class="date">
                                        {{date('d',strtotime($knowledgeData->dateAt)).' '.substr(date('F',strtotime($knowledgeData->dateAt)),0,3).' '.date('Y',strtotime($knowledgeData->dateAt))}}
                                    </div>
                                </div>
                            </div>
                            <div class="row notice notice-show">
                                <a href="{{url('notice/'.$knowledgeData->id)}}" class="col-md-10 notices">
                                    <h3>{{$knowledgeData->title}}</h3>
                                    <p>{{$knowledgeData->description}}</p>
                                </a>
                            </div>
                            @php
                                $file = explode('.',$knowledgeData->attachment);
                                $ext = $file[count($file)-1];
                            @endphp
                            @if($ext === 'pdf')
                                <object data="{{asset('storage/knowledge/'.$knowledgeData->attachment)}}" type="application/pdf"
                                        internalinstanceid="9" title=""
                                        style="
                                            width: 100%;
                                            height: 100vh;">
                                </object>

                            @else
                                <a href="{{asset('storage/knowledge/'.$knowledgeData->attachment)}}">
                                    <img src="{{asset('storage/knowledge/'.$knowledgeData->attachment)}}" alt="notice"
                                         width="100%">
                                </a>

                            @endif
                            <a href="{{url('download/knowledge/'.$knowledgeData->attachment)}}" class="p-4">
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
