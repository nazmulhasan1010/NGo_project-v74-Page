@extends('layouts.frontend')
@section('title','Activities')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $activities = activities('all');
    @endphp
    <!-- project activities -->
    @if($activities)
        <div class="project_summary bg-white-cu content-100">
            <div class="heading">
                <span class="heading-1">Capacity</span>
                <span class="heading-2">Building</span>
            </div>
            <div class="row content-80 activity">
                @foreach($activities as $activity )
                    @if($activity->status==1)
                        <div class="col-md-4 activities">
                            <img src="{{asset('storage/' . $activity->image)}}" alt="">
                            <div class="info-field home">
                                <h2>{{$activity->title}}</h2>
                                {!! $activity->description  !!}
                                <a href="{{url('capacity/'.$activity->id)}}">
                                    <button type="button" class="more-button">Learn more</button>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div><!-- project activities end -->
    @endif


@endsection
