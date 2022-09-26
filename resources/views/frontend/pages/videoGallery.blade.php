@extends('layouts.frontend')
@section('title','Videos')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $videos = getVideo();
    @endphp

    <div class="project_summary bg-dark-cu content-100">
        <div class="row content-80 ">

            <div class="col-md-12 sub-container gallery">
                <div class="heading">
                    <span class="heading-1">Video</span>
                    <span class="heading-2">Gallery</span>
                </div>
                <div class="row videos">
                    <div class="row">
                        @foreach($videos as $video)
                            <div class="col-md-4">
                                {!! $video->link !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
